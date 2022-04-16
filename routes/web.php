<?php

use Illuminate\Support\Facades\DB;
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
    return view('inicio');
});

#CRUD de productos
Route::get('/productos', function(){
    /* $productos = DB::select('SELECT * FROM productos'); */
    $productos = DB::table('productos')->get();
    return view('productos', ['productos'=>$productos]);
});

#CRUD de categorías
Route::get('/categorias', function(){
    $categorias = DB::table('categorias')
                  ->get();
    return view('categorias', [ 'categorias'=>$categorias ]);
});
