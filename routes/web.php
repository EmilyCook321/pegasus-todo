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
    return view('todos');
});

Route::get('todos/{todo}', function ($slug) {

    $path = __DIR__ . "/../resources/todos/{$slug}.html";


    if (!file_exists($path)) {
        return redirect('/');
    }

    $todo = file_get_contents($path);

    return view('todo', [
        'todo' => $todo
    ]);
})->where('todo', '[A-z_\-]+');
