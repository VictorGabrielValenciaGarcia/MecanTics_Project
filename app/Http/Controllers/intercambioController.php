<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\producto;
use App\Models\intercambio;

class intercambioController extends Controller
{

    /// Esta funcion la manda a llamar el centro de canjeo cuando busca a un usuario por su ID y matricula
    public function index( Request $request ){

        ///Validamos que los datos ingresados por el centro de canjeo cumplan los requisitos
        $request->validate([

            'id_usuario'=>'required | numeric', //el id del usuario es olbigatorio y debe ser un numero
            'matricula_usuario'=>'required|max:11|min:10| regex:/^[a-zA-Z0-9]+$/u', //la matrícula del usuario es obligatorio, debe ser de maximo 11, mínimo 10 caracteres y solo se permiten numeros y letras (sin espacios)
            ],    
            [            
                'id_usuario.required' => 'El campo Id es obligatorio',
                'id_usuario.numeric' => 'El Id del usuario es un número',
                'matricula_usuario.required' => 'El campo Matrícula es obligatorio',
                'matricula_usuario.max' => 'La Matrícula del usuario no es mayor a 11 dígitos',
                'matricula_usuario.min' => 'La Matrícula del usuario es mayor a 10 dígitos',
                'matricula_usuario.regex' => 'Solo números y letras (sin espacios)',
            ]);


            $id_usuario = $request->id_usuario;
            $matricula_usuario = $request->matricula_usuario;
        
         //Buscamos el registro que tenga la matricula y el id escrito
         $usuario = User::where('id', '=', $id_usuario)
                 ->where('matricula', '=', $matricula_usuario)
                 ->first([
                     'username',
                     'id',
                     'nombre',
                     'primer_ap',
                     'segundo_ap',
                     'puntos'    
                 ]);
        
        //Si el registro es encontrado
         if ($usuario) {
            $productos = producto::all();
            return view ('centrosdecanjeo.descontador')
                            ->with('usuario',$usuario)
                            ->with('productos',$productos);
        //Si el registro no es encontrado
        }else{
            return view('centrosdecanjeo.userNoFound');
        }
                  
    }

    /// Esta funcion geneara/realizar el intercambio
    public function store(Request $request){

        $usuario = User::where('id','=',$request->id_usuario)->first(); /// Id del ussuario al que se le va a aplicar el intercambio
        $productos = producto::all(); /// Mandamos a llamar a todos los productos registrados

        //Si el producto a intercambiar fue seleccionado y la fecha del intercambio fue dictada
        if ($request->id_producto != '' && $request->fecha != '') {

            //Validamos que los siguientes campos esten rellenados
            $request->validate([

                'id_centrocanjeo'=>'required', //Obligatorio
                'id_usuario'=>'required', //Obligatorio
                'puntos_requeridos'=>'required', //Obligatorio
                'id_producto'=>'required', //Obligatorio
                'fecha'=>'required | date', //Obligatorio
                ],    
                [            
                    'id_centrocanjeo.required' => 'El Id del Centro de canjeo es obligatorio',
                    'id_usuario.required' => 'El Id del usuario es un obligatorio',
                    'puntos_requeridos.required' => 'No se pudo determinar los puntos requeridos para el producto seleccionado',
                    'id_producto.required' => 'El producto a adquirir es obligatorio',
                    'fecha.required' => 'Es necesario especificar la fecha de aquisición',
                    'fecha.date' => 'No es una fecha valida',
            ]);

            //Llamamos a los todos los datos de Usuarios y productos
            //Algunos de esos datos los ocuparemos en la condicion para poder realizar el intercambio
            $producto = Producto::where('idproducto','=',$request->id_producto)->first();
            $usuario = User::where('id','=',$request->id_usuario)->first();

            //Se alamacenan los dato que serviran para la condicion
                
            $puntos_requeridos = $producto->puntos_requeridos; //Puntos requeridos para el canje del producto (por si el usuario se pasa de listo y cambia el precio del producto)
            $disponible = $producto->cantidad_disponible; //Cantidad en stock disponible de ese producto
            $usuario_puntos_disponibles = $usuario->puntos; //Puntos que el usuario posee

            $puntos_restantes= $usuario_puntos_disponibles - $puntos_requeridos; //Puntos que tendra el usuario despues del canje

            // Si aún quedan productos disponibles y el usuario tiene sufucientes puntos, Registramos el intercambio
            if ( $disponible>=1 && $puntos_restantes>0 ) {

                $intercambio = new Intercambio();

                $intercambio->id_usuario = $request->id_usuario;
                $intercambio->id_centrocanjeo = $request->id_centrocanjeo;
                $intercambio->id_producto = $request->id_producto;
                $intercambio->puntos_descontados = $puntos_requeridos;
                $intercambio->fecha = $request->fecha;

                $registro_guardado = $intercambio->save();

                //Si la validacion es correcta
                if ( $registro_guardado ) {

                    // quitamos 1 producto
                    $producto = Producto::where('idproducto','=',$request->id_producto)
                        ->decrement('cantidad_disponible');

                    // Le quitamos al usuario los puntos requeridos
                    $usuario = User::where('id','=',$request->id_usuario)
                        ->decrement('puntos', $puntos_requeridos);

                }
                
                return redirect('/usuarios')->with('success','Intercambio realizado');
                
                //De lo contrario
                }else {
                    return view ('centrosdecanjeo.intercambio_fallido');
                }
        // Si los campos requeridos estan vacios regresamos la pantalla con el mensaje
        } else {
            return view('centrosdecanjeo.descontador', compact('productos','usuario'))->withErrors('Es obligatorio rellenar todos los campos');;
        }

    }

    /// Esta funcion la trabajan los centros de canjeo y administradores
    //Muestra la informacion completa del intercambio a modo de ticket
    public function show($id){

        $intercambio = intercambio::findOrFail($id); ///Buscamos el registro

        $producto = Producto::where('idproducto','=',$intercambio->id_producto)->first(); //Solicitamos a las base de datos la inf del producto adquirido en ese intercambio
        $usuario = User::where('id','=',$intercambio->id_usuario)->first();//Solicitamos a las base de datos la inf del usuario que solicito el intercambio
        $centro = User::where('id','=',$intercambio->id_centrocanjeo)->first();//Solicitamos a las base de datos la inf del usuario que realizo el intercambio

        //regresamos la vista con todos los datos del intercambio
        return view('admin.intercambios.detalles_intercambio')->with(compact('intercambio', 'producto', 'usuario', 'centro'));
        
    }
    
    /// Esta funcion es unicamente del ADMI 
    //Despliega una lista con todos los intercambios existentes
    public function listaIntercambio(){

        $intercambios = intercambio::paginate(5);
        return view ('admin.intercambios.intercambios')->with('intercambios',$intercambios);
    }

    //Esta funcion por el momento es unica del centro de canjeo
    //Permite cambiar el estado del intercambio de Pendiente -> realizado, o viceversa
    public function estado(Request $request ){

        $id = $request->input("id"); // Id recuperado del input hidden en la pantalla centrosdecanjeo.intercambios_realizados o centrosdecanjeo.intercambios_pendientes dentro del form/boton para cambiar estado

        $intercambio = intercambio::find($id);
 
        if ($intercambio->estado == "Pendiente") {
            $intercambio->estado = "Realizado";
        }else{
            $intercambio->estado = "Pendiente";
        }
        $intercambio->save();
        return back()->with('success','El estado del producto ha sido actualizado!!');
    }

    // Esta funcion es unica del centro de canjeo
    // Muestra una lista con todos los intercambios realizados
    public function intercambioRealizado(){
        $intercambios = intercambio::where('estado','=','Realizado')->paginate(6);
        return view ('centrosdecanjeo.intercambios_realizados')->with('intercambios',$intercambios);
    }
    
    // Esta funcion es unica del centro de canjeo
    // Muestra una lista con todos los intercambios realizados
    public function intercambioPendiente(){
        $intercambios = intercambio::where('estado','=','Pendiente')->paginate(6);
        return view('centrosdecanjeo.intercambios_pendientes')->with('intercambios',$intercambios);
    }
}
