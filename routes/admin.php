<?php

use App\Http\Controllers\Admin\ArchivoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContratacionController;
use App\Http\Controllers\Admin\ConvocatoriaController;
use App\Http\Controllers\Admin\EducacionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PeliculaController; // Asegúrate de que el nombre del controlador es correcto
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProgramaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;




// Rutas para el panel administrativo
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Ruta principal del panel administrativo
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->middleware('can:admin.index')->name('admin.index');
    });

    // Rutas de recursos
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update', 'destroy'])
        ->names('admin.users');

    Route::resource('categories', CategoryController::class)
        ->names('admin.categories');

    Route::resource('tags', TagController::class)
        ->names('admin.tags');

    Route::resource('posts', PostController::class)
        ->names('admin.posts');

    Route::resource('roles', RoleController::class)
        ->names('admin.roles');

    Route::resource('sliders', SliderController::class)
        ->names('admin.sliders');

    Route::resource('contratacion', ContratacionController::class)
        ->names('admin.contratacion');

    Route::resource('educacion', EducacionController::class)
        ->names('admin.educacion');

    Route::resource('convocatorias', ConvocatoriaController::class)
        ->names('admin.convocatoria');

    Route::resource('archivos', ArchivoController::class)
        ->names('admin.archivos');

    Route::resource('comments', CommentController::class)
        ->names('admin.comments');

    Route::resource('programas', ProgramaController::class)
        ->names('admin.programas');

    // Ruta para las películas
    Route::resource('peliculas', PeliculaController::class) // Corregido el nombre del controlador
    ->except('index')
        ->names('admin.peliculas');


});