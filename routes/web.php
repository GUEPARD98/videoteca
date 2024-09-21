<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PeliculaController;
use App\Http\Controllers\Byn;
use App\Http\Controllers\TenemosController;
use App\Http\Controllers\ObjetivosController;
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

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('pages.index');
    Route::get('/posts/{post}', 'showArticulo')->name('posts.show');
    Route::get('/searches', 'search')->name('posts.search');
    Route::get('/etiquetas/{tag}', 'tag')->name('posts.tag');
    Route::get('/contratacion', 'contratacion')->name('pages.contratacion');
    Route::get('/convocatoria', 'convocatoria')->name('pages.convocatoria');
    Route::get('/vision', 'vision')->name('pages.vision');
    Route::get('/mision', 'mision')->name('pages.mision');
    Route::get('/objetivo', 'objetivo')->name('pages.objetivo');
    Route::get('/comunicacion', 'comunicacion')->name('pages.comunicacion');
    Route::get('/contratacion/{post}', 'showContratacion')->name('pages.show-contratacion');
    Route::get('/estructura', 'estructura')->name('pages.estructura');
    Route::get('/documentos', 'documents')->name('pages.documents');
    Route::get('/educacion', 'educacion')->name('pages.educacion');
    Route::get('/educacion/{post}', 'showEducacion')->name('pages.show-educacion');
    Route::get('/comunicacion/{post}', 'show_comunicacion')->name('pages.show-comunicacion');
    Route::post('/comment/{post}', 'storeComment')->name('comments.store');
    Route::get('/contador', 'counter')->name('contador');

    // Ruta pública para la búsqueda de películas
  Route::get('/peliculas', [PeliculaController::class, 'index'])->name('pages.peliculas');
    Route::get('/peliculas', [FrontController::class, 'showMovies'])->name('pages.peliculas');
    Route::get('/peliculas/{id}', [FrontController::class, 'show'])->name('pages.show');
    Route::get('/byne', [Byn::class, 'showByN'])->name('pages.byn');
    Route::get('/tenemos', [TenemosController::class, 'show'])->name('pages.tenemos');
    Route::get('/objetivos', [ObjetivosController::class, 'showObjetivos'])->name('pages.objetivos');


    Route::get('pelicula', [PeliculaController::class, 'index'])->name('admin.peliculas.index');





});



Route::controller(ContactController::class)->group(function () {
    Route::get('/contactanos', 'showContactForm')->name('pages.contactanos');
    Route::get('/contactanos/thankyou', 'showThankYouPage')->name('pages.thankyou');
    Route::post('/contactanos', 'submitContactForm')->name('contact.submit');
});

/*Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('movies', MovieController::class);
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});