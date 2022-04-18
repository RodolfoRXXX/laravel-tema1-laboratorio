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

Route::get('/categoria/create', function(){
    return view('categoriaCreate');
});
Route::post('/categoria/store', function(){
    $codCategoria = request()->codCategoria;
    $desCategoria = request()->desCategoria;
    /*DB::insert('INSERT INTO categorias
                            (cod_categoria ,descripcion)
                       VALUE
                            (:cod_categoria ,:descripcion)',
                            [$codCategoria ,$desCategoria]);*/
    DB::table('categorias')
        ->insert(['descripcion'=>$desCategoria, 'cod_categoria'=>$codCategoria]);
        return redirect('categorias')
               ->with(['mensaje'=>'La categoria '.$desCategoria.' ha sido creada.']);
});

Route::get('/categoria/edit/{codCategoria}', function($codCategoria){
    /*$categoria = DB::select('SELECT * FROM categorias 
                             WHERE cod_categoria = :cod_categoria',
                             [$codCategoria]);*/
    $categoria = DB::table('categorias')
                ->where('cod_categoria', $codCategoria)
                ->first();
    return view('categoriaEdit',['categoria'=>$categoria]);
});
Route::post('/categoria/update', function(){
    $codCategoria = request()->codCategoria;
    $desCategoria = request()->desCategoria;
        DB::update('UPDATE categorias
                    SET 
                        descripcion = :desCategoria
                    WHERE
                        cod_categoria = :codCategoria',
                        [$desCategoria, $codCategoria]
                    );
        return redirect('categorias')
               ->with(['mensaje'=>'La categoría '.$desCategoria.' ha sido modificada.']);
                 
});