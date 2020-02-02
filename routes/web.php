<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//App\User::create([
//    'name'=>'Carla',
//    'email'=>'carla@gmail.com',
//    'password'=>bcrypt('carla123'),
//    'role'=>'moderador',
//    'role_id'=>1
//]);

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('roles', function () {
    return \App\Role::with('user')->get(); // llama al metodo user; hasOne devuelve solo un objeto de la relacion, hasMany devuelve un array de objetos relacionados. 
});
/*Route::get('prueba',function(){
    $nombre= "Ammiel";
    return view('prueba')->with('nombre',$nombre);
})->name('pruebas');*/
//Route::view('/prueba', 'prueba', ['nombre' => "Ammiel"]);

//Route::get('/prueba', 'PruebaController@index');
Route::view('/prueba', 'prueba', ['nombre' => "Ammiel"]);
//Route::resource('prueba', 'PruebaController')->except(['index', 'show']);

Route::get('/prueba-test', 'PruebaController@index')->name('prueba.index');
Route::post('/prueba-test', 'PruebaController@store')->name('prueba.store');
Route::get('/prueba-test/crear', 'PruebaController@create')->name('prueba.create');
Route::get('/prueba-test/{id}', 'PruebaController@show')->name('prueba.show');
Route::get('/prueba-test/{id}/editar', 'PruebaController@edit')->name('prueba.edit');
Route::patch('/prueba-test/{id}', 'PruebaController@update')->name('prueba.update');
Route::delete('/prueba-test/{id}', 'PruebaController@destroy')->name('prueba.destroy');

Route::get('contactanos', function () {
    return 'Seccion de contactos';
})->name('contactos');

/*Route::get('/home', function () {
    echo "<a href='" . route('contactos') . "'>Contactos 1</a><br/>";
    echo "<a href='" . route('contactos') . "'>Contactos 2</a><br/>";
    echo "<a href='" . route('contactos') . "'>Contactos 3</a><br/>";
    echo "<a href='" . route('contactos') . "'>Contactos 4</a><br/>";
    echo "<a href='" . route('contactos') . "'>Contactos 5</a>";
});*/

Route::view('/about', 'about')->name('about');
Route::get('/portfolio', 'ProjectController@index')->name('projects.index');
Route::post('/portfolio', 'ProjectController@store')->name('projects.store');
Route::get('/portfolio/crear', 'ProjectController@create')->name('projects.create');
Route::get('/portfolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
Route::put('/portfolio/{project}', 'ProjectController@update')->name('projects.update');
Route::get('/portfolio/{project}', 'ProjectController@show')->name('projects.show');
Route::delete('/portfolio/{project}', 'ProjectController@destroy')->name('projects.destroy');

//Route::resource('portfolio', 'ProjectController')->names('projects')->parameters(['portfolio' => 'project']);

//Usuarios
Route::get('/usuarios', 'UsersController@index')->name('usuarios.index');
Route::get('/usuarios/crear', 'UsersController@create')->name('usuarios.create');
Route::get('/usuarios/{id}/editar', 'UsersController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', 'UsersController@update')->name('usuarios.update');
Route::post('usuarios', 'UsersController@store')->name('usuarios.store');
Route::get('/usuarios/{id}', 'UsersController@show')->name('usuarios.show');
Route::delete('/usuarios/{id}', 'UsersController@destroy')->name('usuarios.destroy');

Route::view('/contact', 'contact')->name('contact');
Route::post('contact', 'MenssageController@store')->name('messages.store');

Route::get('messages', 'MenssageController@index')->name('messages.index');
Route::get('messages/{id}/editar', 'MenssageController@edit')->name('messages.edit');
Route::put('messages/{id}', 'MenssageController@update')->name('messages.update');
Route::get('messages/{id}', 'MenssageController@show')->name('messages.show');
Route::delete('messages/{id}', 'MenssageController@destroy')->name('messages.destroy');

Auth::routes(); // esta linea registra las siguientes rutas:

// Desabilita la opcion registrar
//Auth::routes(['register' => false]);

/*
   ----LoginController----- esta dentro del namespace App\Http\Controllers\Auth
    GET  /login =Para mostrar el formulario de login
    POST /login =Donde se envía el formulario del login
    POST /logout =Para cerrar la sesion actual 

    ---RegisterController----esta dentro del namespace App\Http\Controllers\Auth
    GET /register = Para mostrar el formulario de registro
    POST /register = Donde se envía el formulario de registro

    Nos crea vistas resources/views/
    auth/
    login.blade.php
    register.blade.php
    layout/
    app.blade.php //contiene la estructura html + bootstrap 4

    //HOME -> a manera de ejemplo para mostrar como proteger partes de la aplicacion nos crea
    Vista -> resources/views/home.blade.php
    Controlador -> app/Http/Controllers/HomeController.php
    Ruta   -> /home  ; crea el metodo get para los usuario que solo hicieron login, sino estan autenticados redireccionan a la vista login

*/

//Route::get('/home', 'HomeController@index')->name('home');


// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::resetPassword();
