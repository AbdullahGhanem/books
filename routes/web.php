<?php
 use Scriptotek\GoogleBooks\GoogleBooks;
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

Route::get('/test', function () {
$books = new GoogleBooks();
dd($books->volumes->search('php'));
});


Auth::routes();

Route::get('/', 'BookController@index')->name('books.index');
Route::get('books/{id}', 'BookController@show')->name('books.show');
Route::get('mybooks', 'BookController@mybooks')->name('mybooks');

Route::post('like', 'likeController@like');
Route::post('unlike', 'likeController@unlike');
