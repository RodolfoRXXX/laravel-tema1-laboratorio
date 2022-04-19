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

#---------------------------------------------------------------------------------------
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
        return redirect('/categorias')
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
    $cod_categoria = request()->cod_categoria;
    $descripcion = request()->descripcion;
        /*DB::update('UPDATE categorias
                    SET descripcion = :descripcion
                    WHERE cod_categoria = :cod_categoria',
                        [$descripcion, $cod_categoria]
                    );*/
        DB::table('categorias')
            ->where('cod_categoria', $cod_categoria)
            ->update(['descripcion'=>$descripcion]);
        return redirect('/categorias')
               ->with(['mensaje'=>'La categoría '.$descripcion.' ha sido modificada.']);
       
});

Route::get('/categoria/delete/{cod_categoria}', function($cod_categoria){
    /*$categoria = DB::select( //devuelve un array con un objeto, debo elegir dicho objeto del array[0]
                    'SELECT * FROM categorias WHERE cod_categoria=:cod_categoria',
                    [$cod_categoria]
                );*/
    $categoria = DB::table('categorias')
                ->where('cod_categoria', $cod_categoria)
                ->first();
    return view('/categoriaDelete', ['categoria'=>$categoria]);
});
Route::post('/categoria/delete', function(){
    $cod_categoria = request()->cod_categoria;
        /*DB::delete('DELETE FROM categorias WHERE cod_categoria=:cod_categoria',
                [$cod_categoria]);*/
        DB::table('categorias')
            ->where('cod_categoria', $cod_categoria)
            ->delete();
        return redirect('/categorias')
               ->with(['mensaje'=>'El registro '.$cod_categoria.' ha sido eliminado']);
});

#----------------------------------------------------------------------------------------
#CRUD de productos
Route::get('/productos', function(){
    /* $productos = DB::select('SELECT * FROM productos'); */
    $productos = DB::table('productos')->get();
    return view('productos', ['productos'=>$productos]);
});

Route::get('/producto/create', function(){
    return view('productoCreate');
});
Route::post('/producto/store', function(){
    $cod_producto  = request()->cod_producto;
    $cod_categoria = request()->cod_categoria;
    $nombre        = request()->nombre;
    $precio        = request()->precio;
    $stock         = request()->stock;
        /*DB::insert(
            'INSERT INTO productos
                (cod_producto, cod_categoria, nombre, precio, stock)
            VALUE
                (:cod_producto, :cod_categoria, :nombre, :precio, :stock)',
                [$cod_producto, $cod_categoria, $nombre, $precio, $stock]
        );*/
        DB::table('productos')
            ->insert(['cod_producto'=>$cod_producto, 'cod_categoria'=>$cod_categoria, 'nombre'=>$nombre, 'precio'=>$precio, 'stock'=>$stock]);
        return redirect('/productos')
               ->with(['mensaje'=>'El producto '.$nombre.' ha sido creado correctamente']);
});

Route::get('/producto/edit/{cod_producto}', function($cod_producto){
    /*$productos = DB::select( //devuelve un array con un objeto, debo elegir dicho objeto del array[0]
                    'SELECT * FROM productos WHERE cod_producto=:cod_producto',
                    [$cod_producto]
                );*/
    $productos = DB::table('productos')
                ->where('cod_producto', $cod_producto)
                ->first();
    return view('/productoEdit', ['productos'=>$productos]);
});
Route::post('/producto/update', function(){
    $cod_producto  = request()->cod_producto;
    $cod_categoria = request()->cod_categoria;
    $nombre        = request()->nombre;
    $precio        = request()->precio;
    $stock         = request()->stock;
        /*DB::update('UPDATE productos
                    SET cod_categoria = :cod_categoria, nombre = :nombre, 
                        precio = :precio, stock = :stock 
                    WHERE cod_producto = :cod_producto',
                    [$cod_categoria, $nombre, $precio, $stock, $cod_producto]
        );*/
        DB::table('productos')
            ->where('cod_producto', $cod_producto)
            ->update(['cod_categoria'=>$cod_categoria, 'nombre'=>$nombre, 'precio'=>$precio, 'stock'=>$stock]);
        return redirect('/productos')
               ->with(['mensaje'=>'El producto '.$nombre.' ha sido modificado correctamente']);
});

Route::get('/producto/delete/{cod_producto}', function($cod_producto){
    /*$productos = DB::select( //devuelve un array con un objeto, debo elegir dicho objeto del array[0]
                    'SELECT * FROM productos WHERE cod_producto=:cod_producto',
                    [$cod_producto]
                );*/
    $productos = DB::table('productos')
                ->where('cod_producto', $cod_producto)
                ->first();
    return view('/productoDelete', ['productos'=>$productos]);
});
Route::post('/producto/delete', function(){
    $cod_producto = request()->cod_producto;
        /*DB::delete('DELETE FROM productos WHERE cod_producto=:cod_producto',
                [$cod_producto]);*/
        DB::table('productos')
            ->where('cod_producto', $cod_producto)
            ->delete();
        return redirect('/productos')
               ->with(['mensaje'=>'El registro '.$cod_producto.' ha sido eliminado']);
});