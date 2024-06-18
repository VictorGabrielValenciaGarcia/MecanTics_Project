<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\intercambioController;
use App\Http\Controllers\productoController;

///Home
Route::get('/', function () {
    return view('home');
});

/// Registro
Route::get('/register/{tipo}', [RegisterController::class,'show']);
Route::post('/register', [RegisterController::class,'register']);

///Login
Route::get('login', [LoginController::class,'show']);
Route::post('login', [LoginController::class,'login']);

///Usuarios
Route::post('/usuarios', [UsuarioController::class,'index']);
    //Actulizar Datos
    Route::post('/usuarios_update/centrosdecanjeo', [UsuarioController::class,'update_cc']);
    Route::post('/usuarios_update/usuarios', [UsuarioController::class,'update_usuario']);
    Route::post('/usuarios_update/adiministrador', [UsuarioController::class,'update_admi']);
    //Actulizar Foto Perfil
    Route::post('/cambiarfoto', [UsuarioController::class,'cambiarFoto']);
    //Actulizar Contraseña
    Route::post('/cambiarpass', [UsuarioController::class,'cambiarpass']);

Route::get('/usuarios', [UsuarioController::class,'index']);

///Productos

Route::get('/usuarios/productos/crear', [productoController::class,'createProducto'])->name('crear.producto');
Route::get('/usuarios/productos/{idproducto}', [productoController::class,'editProducto'])->name('editar.producto');
Route::patch('/usuarios/productos/update', [productoController::class,'updateProducto'])->name('actualizar.producto');
Route::post('/usuarios/productos', [productoController::class,'storeProducto'])->name('registrar.producto');
Route::delete('/usuarios/productos/eliminar', [productoController::class,'destroyProducto'])->name('eliminar.producto');

/// Logout
Route::get('/logout', [LogoutController::class,'logout']);

/// Canjeo de puntos / descontador
Route::post('/usuarios/descontador', [intercambioController::class,'index']);
Route::get('/usuarios/descontador', [intercambioController::class,'index']);
Route::post('/usuarios/descontador/descontar', [intercambioController::class,'store']);

///Paginas ADMI
    //Lista Productos
    Route::get('/usuarios/listas/productos', [productoController::class,'listaProducto']);
    Route::get('/usuarios/listas/productos/{id}', [productoController::class,'showProducto'])->name('productos.show');
    //Lista Intercambios
    Route::get('/usuarios/listas/intercambios', [intercambioController::class,'listaIntercambio']);
    Route::get('/usuarios/listas/intercambios/{id}', [intercambioController::class,'show'])->name('intercambios.show');
    //Lista Usuarios
    Route::get('/usuarios/listas/usuarios', [UsuarioController::class,'listaUsuario']);
    Route::get('/usuarios/listas/usuarios/{id}', [UsuarioController::class,'show'])->name('usuarios.show');
    Route::delete('/usuarios/listas/usuarios/eliminar/{id}', [UsuarioController::class,'destroy'])->name('eliminar.usuario');

// Estado Intercambios
Route::put('/usuarios/intercambios/cambiarEstado', [intercambioController::class,'estado'])->name('intercambios.estado');
Route::get('/usuarios/intercambios/pendientes', [intercambioController::class,'intercambioPendiente']);
Route::get('/usuarios/intercambios/realizados', [intercambioController::class,'intercambioRealizado']);