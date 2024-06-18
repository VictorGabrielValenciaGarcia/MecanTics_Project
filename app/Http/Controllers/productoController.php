<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class productoController extends Controller
{
    

    /// Esta funcion nos lleva al formulrio de registro de productos
    public function createProducto(){
        return view('centrosdecanjeo.editarproductos');
    }
    
    /// Esta funcion es la que registra los productos
    public function storeProducto(Request $request){
        
        //Validamos que los productos cumplan las siguientes campos
        $request->validate([

        'imagen'=>'required',
        'tipo'=> 'required | max:30',//nombre del producto
        'precio'=> 'required | numeric',
        'puntos_requeridos'=>'required | numeric | integer',
        'cantidad_disponible'=>'required | numeric'

        ],    
        [
            
            'imagen.required' => 'La imagen del producto es obligatoria',
            'imagen.max' => 'La imagen no puede pesar más de 1 MB',
            'tipo.required' => 'El nombre del producto es obligatorio',
            'tipo.max' => 'Solo 30 caracteres',
            'precio.required' => 'El costo del producto está vacío',
            'precio.numeric' => 'El costo del producto debe ser un número',
            'puntos_requeridos.required' => 'Necesita establecer el costo por canje ',
            'puntos_requeridos.numeric' => 'El costo por canje debe ser un número',
            'puntos_requeridos.integer' => 'El costo por canje debe ser un entero',
            'cantidad_disponible.required' => 'Es necesario especificar el Stock',
            'cantidad_disponible.numeric' => 'La cantidad en Stock debe ser un número',

        ]);

        //Registro de Productos
        // Si las validaciones son correctas registramos el producto
        $producto = producto::create($request->only('imagen','tipo','precio','puntos_requeridos','cantidad_disponible'));

        $producto->save();
        return redirect('/usuarios')->with('success','Producto guardado');

    }
    
    /// Esta funcion nos lleva al formulrio actualizar la información del producto
    public function editProducto($idproducto){

        $producto = producto::where('idproducto','=',$idproducto)->first();
        return view('centrosdecanjeo.editarproductos',compact('producto'));
      //return view('centrosdecanjeo.editarproductos')->with('producto',$producto);
    }

    /// Esta funcion es la que actualiza al producto
    public function updateProducto(Request $request){

        // Id recuperado de un input hidden en el formulario
        $idproducto = $request->input("idproducto");
        //Validamos que los productos cumplan las siguientes campos
        $prod=$request->validate([

            'imagen'=>'required',
            'tipo'=> 'required | max:30',//nombre del producto
            'precio'=> 'required | numeric',
            'puntos_requeridos'=>'required | numeric | integer',
            'cantidad_disponible'=>'required | numeric'

        ],    
        [
            
            'imagen.required' => 'La imagen del producto es obligatoria',
            'imagen.max' => 'La imagen no puede pesar más de 1 MB',
            'tipo.required' => 'El nombre del producto es obligatorio',
            'tipo.max' => 'Solo 30 caracteres',
            'precio.required' => 'El costo del producto está vacío',
            'precio.numeric' => 'El costo del producto debe ser un número',
            'puntos_requeridos.required' => 'Necesita establecer el costo por canje ',
            'puntos_requeridos.numeric' => 'El costo por canje debe ser un número',
            'puntos_requeridos.integer' => 'El costo por canje debe ser un entero',
            'cantidad_disponible.required' => 'Es necesario especificar el Stock',
            'cantidad_disponible.numeric' => 'La cantidad en Stock debe ser un número',


        ]);

        //Actualizacion de Productos
        // Si las validaciones son correctas actualizamos el producto
        producto::where("idproducto","=",$idproducto)->update($prod);
        return redirect('/usuarios')->with('success','Lo datos del producto han sido actualizado con éxito');
    }

    /// Esta funcion nos permite eliminar a un producto
    public function destroyProducto( Request $request ){

        // Id recuperado de un input hidden en el formulario
        $idproducto = $request->input("idproducto");

        //https://stackoverflow.com/questions/52658708/how-to-use-pre-defined-destroy-method-in-laravel
        producto::where('idproducto',$idproducto)->delete();

        return back()->with('eliminar','Listo');

    }
    
  ///Las siguintes funciones son unicas de Administradores

    /// Esta funcion despliega una pantalla con todos los productos que se tienen registrados
    public function listaProducto(){
        $productos = producto::paginate(6);
        return view ('admin.products.productos')->with('productos',$productos);
    }

    /// Esta funcion muestra toda la información del producto seleccionado
    public function showProducto($idproducto){
        $producto = producto::where('idproducto','=',$idproducto)->first();
        return view('admin.products.detalles_producto',compact('producto'));
    }
    
}
