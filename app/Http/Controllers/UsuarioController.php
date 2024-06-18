<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUsuario;
use App\Http\Requests\ChangeImage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\producto;
use App\Models\User;
use App\Models\intercambio;

class UsuarioController extends Controller
{

    /// Esta funcion nos regresa a la pantalla prinicpal del usuario con todos los productos registrados
    /// Esta funcion solo es util para los usuarios y centros de canjeo
    public function index(){
        $productos = producto::paginate(5);
        return view ('usuarios.usuario_pantalla')->with('productos',$productos);
    }

    /// Esta funcion es unica de los Administradores
    /// Nos mostrara un pantalla donde se muestre toda ls infromacion correspondiente del ususario seleccionado
    public function show($id){
        $usuario = User::find($id);
        return view('admin.usuarios.detalles_usuario',compact('usuario'));
    }

    /// Esta funcion es unica de los Administradores
    /// Nos mostrara un pantalla donde se listan todos los usuarios registrados
    public function listaUsuario(){
        
        $usuarios = User::paginate(5);
        return view ('admin.usuarios.usuarios')->with('usuarios',$usuarios);
    }

    /// Esta funcion es unicamente para que el Centro de canjeo actualice sus datos
    public function update_cc(Request $request){

        // Id recuperado de un input hidden dentro del formulario
        $id = $request->input("id");

        $us=$request->validate([

            'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
            'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'correo_personal'=>'required|email',
            'username'=>'required',
        ]);

        // Actulizamos la informacion del usuario, siempre que la variable $us nos muestre que las validaciones fueron correctas
        User::whereId($id)->update($us);
        return redirect('/usuarios')->with('success','Los datos han sido actualizados correctamente');            
    }

    /// Esta funcion es unicamente para que el Usuario actualice sus datos
    public function update_usuario(Request $request){

         // Id recuperado de un input hidden dentro del formulario
        $id = $request->input("id");

        $us=$request->validate([

            'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
            'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'correo_inst'=>'required|email',
            'correo_personal'=>'required|email',
            'grupo'=>'required',
            'username'=>'required',
            'matricula'=>'required|max:11||min:10| regex:/^[a-zA-Z0-9]+$/u',
        ]);
    
        // Actualizamos la informacion del usuario, siempre que la variable $us nos muestre que las validaciones fueron correctas
        User::whereId($id)->update($us);
        return redirect('/usuarios')->with('success','Los datos han sido actualizados correctamente');            
    }
    
    /// Esta funcion es unicamente para que el Administrador actualice sus datos
    public function update_admi(Request $request){

         // Id recuperado de un input hidden dentro del formulario
        $id = $request->input("id");

        $us=$request->validate([

            'nombre'=>'required | regex:/^[\pL\s\-]+$/u',
            'primer_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'segundo_ap'=>'required | regex:/^[\pL\s\-]+$/u',
            'correo_personal'=>'required|email',
            'username'=>'required',
        ]);

        // Actualizamos la informacion del usuario, siempre que la variable $us nos muestre que las validaciones fueron correctas
        User::whereId($id)->update($us);
        return redirect('/usuarios')->with('success','Los datos han sido actualizados correctamente');            
    }

    /// Esat funcion elimina al usuario seleccionado de la BD
    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return back()->with('eliminar','Listo');;
    }

    /// Esat funcion permite al usuario actulizar su foto de perfil
    /// Las validaciones estan en el doc Request/ChangeImage
    public function cambiarFoto(ChangeImage $request){

        $user = Auth::user();
        
        $user->update($request->all());

        return redirect('/usuarios')->with('success','La foto de perfil ha sido actualizada correctamente');
        
    }

    /// Esta funcion permite al usuario actualizar su contraseña
    public function cambiarpass(Request $request){

        //Validaciones requeridas para actualizar la contraseña
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password',
        ]);

        /// Si la contraseña actual del usuario es correcta
        if (Hash::check($request->current_password, auth()->user()->password)) {

            /// La actulizamos con la nueva contraseña definida
            auth()->user()->update(['password'=> $request->password]);

            return back()->with('success','Contraseña actualizada con éxito');
        }
        
        /// De lo contrario
        throw ValidationException::withMessagges([
            'current_password'=>'Tu contraseña actual no coincide con nuestros registros',
        ]);

        return redirect('login');
    }
}
