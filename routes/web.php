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

//Cambiar idioma de la App
//
// App::setLocale("es");

// para acceder al ORM hay que hacer un 'use' del Modelo 
// use App\Image;

// Route::get('/', function () {

//     // $images = Image::all();
//     // // $images=Image::u
//     // foreach ($images as $image) {
//     //     // var_dump($image);
//     //     echo $image->image_path . "<br/>";
//     //     echo $image->description . "<br/>";
//     //     echo $image->user->name . ' ' . $image->user->surname;
//     //     // Como hacemos para acceder al usuario de la imagen??
//     //     // sencillo
//     //     //
//     //
//     //     # Solo muestra el titulo "Comentarios" si existe alguno
//     //     if (count($image->comments) >= 1) {
//     //         echo '<h4> Comentarios</h4>';
//     //
//     //         foreach ($image->comments as $comment) {
//     //             //atención a esta linea:
//     //             echo $comment->user->name . ' ' . $comment->user->surname . ": ";
//     //             # accedemos a $images->comments->user(name) y a user(surname)
//     //             echo $comment->content . '<br/>';
//     //         }
//     //     } else {
//     //         echo '<br/>';
//     //     } 
//     //
//     //     echo "LIKES: " . count($image->likes);
//     //     echo "<hr/>";
//     // }

//     // die();
//     return view('welcome');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/configuracion', 'UserController@config')->name('config');

Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/cuentas/{search?}', 'UserController@index')->name('user.index');

Route::get('/subir-imagen', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
//para obtener las imagenes desde home, usando una etiqueta img con src apuntando a esta ruta mediante el metodo getImage del ImageController
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/image/update', 'ImageController@update')->name('image.update');



Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');

Route::get('/perfil/{id}', 'UserController@profile')->name('profile');



// Route::get('/prueba', 'HomeController@prueba')->name('prueba');