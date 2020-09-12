<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.principal');
   // return view('welcome');
});


/*Route::get('/index', function () {
    return view('layouts.principal');
});*/


//Route::get('/dash', function () {
  //  return view('dashboard.dash');
//});

//Route::get('/dash', 'AdminController@index');

//Route::resource('/dash', 'AdminController');





Route::group(['prefix' => 'dash', 'as' => 'dash'], function () {
   
    Route::get('/', 'AdminController@index' );
    
    /*Route::get('/admin', function () {
        return view('dashboard.admin.admindash');
    });

    Route::get('/user', function () {
        return view('dashboard.user.userdash');
    });*/

    //Route::get('/admin/productos', 'ProductosController@index');
    //Route::get('admin/usuarios', 'UsuariosController@index');
    //::get('admin/qys', 'QySController@index');
    //Route::get('admin/ofertas', 'OfertasController@index');
    //Route::get('admin/categorias', 'CategoriasController@index');
    //Route::get('admin/roles', 'RolesController@index');
    //Route::get('admin/sucursales', 'SucursalesController@index');
    //Route::post('admin/cupones', 'CuponesController@store');


    
    Route::resource('admin/usuarios', 'UsuariosController');
    Route::resource('admin/productos', 'ProductosController');
    Route::resource('admin/qys', 'QySController');
    Route::resource('admin/roles', 'RolesController');
    Route::resource('admin/categorias', 'CategoriasController');
    Route::resource('admin/sucursales', 'SucursalesController');
    Route::resource('admin/cupones', 'CuponesController');
    Route::resource('admin/ofertasimg', 'ImgOfertasController');
    Route::resource('admin/ofertaspdf', 'OfertasPdfController');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dash/admin/usuarios/correo', 'UsuariosController@correo');


Route::post('dash/admin/productos', ['as'=>'croppie.upload-image','uses'=>'ProductosController@store']);

Route::post('dash/admin/ofertasimg', ['as'=>'croppie.subir-image','uses'=>'ImgOfertasController@store']);


//Route::post('dash/admin/ofertasimg', ['as'=>'croppie.upload-image','uses'=>'ImgOfertasController@store']);
//Route::post('dash/admin/usuarios/edit', 'UsuariosController@edit');

Route::post('dash/admin/productos/editar', ['as'=>'croppie.editar-image','uses'=>'ProductosController@editar']);
Route::post('dash/admin/productos/ofertasimg/editar', ['as'=>'croppie.editarOferta-image','uses'=>'ImgOfertasController@editar']);


Route::post('dash/admin/categorias/editar', 'CategoriasController@editar');
Route::post('dash/admin/roles/editar', 'RolesController@editar');
Route::post('dash/admin/sucursales/editar', 'SucursalesController@editar');
Route::post('dash/admin/cupones/editar', 'CuponesController@editar');
Route::post('dash/admin/usuarios/editar', 'UsuariosController@editar');




Route::post('dash/admin/usuarios/{usuario}', 'UsuariosController@estado');





//Route::post('admin', ['as'=>'croppie.upload-image','uses'=>'ImageCropController@imageCrop']);
//Route::get('image_crop','ImageCropController@index');

//Route::post('image_crop/upload', 'ImageCropController@upload')->name('image_crop.upload');



//Route::get('crop-image-before-upload-using-croppie', 'CropImageController@index');
//Route::post('crop-image-before-upload-using-croppie', ['as'=>'croppie.upload-image','uses'=>'CropImageController@uploadCropImage']);