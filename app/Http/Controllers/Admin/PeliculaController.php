<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeliculaController extends Controller
{
    // Mostrar una lista de películas con opción de búsqueda
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category'); // Corregido: `category` en lugar de `categories`
        $fecha_creacion = $request->input('fecha_creacion');

        $query = Pelicula::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('titulo', 'LIKE', "%{$search}%")
                  ->orWhere('descripcion', 'LIKE', "%{$search}%")
                  ->orWhere('autor', 'LIKE', "%{$search}%")
                  ->orWhere('lugar_grabacion', 'LIKE', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category_id', $category); // Corregido: `category_id` en lugar de `categoria`
        }

        if ($fecha_creacion) {
            $query->whereDate('fecha_creacion', $fecha_creacion);
        }

        $peliculas = $query->latest()->paginate();

        // Obtener todas las categorías para el filtro
        $categories = Category::all();

        return view('pages.peliculas', [
            'peliculas' => $peliculas,
            'categories' => $categories
        ]);
    }

    // Mostrar el formulario para crear una nueva película
    public function create()
    {
        // Obtener las categorías para el formulario
        $categories = Category::pluck('name', 'id');

        return view('admin.peliculas.create', [
            'categories' => $categories
        ]);
    }

    // Guardar una nueva película en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'video_url' => 'nullable|url',
            'poster_imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'autor' => 'nullable|string|max:255',
            'fecha_creacion' => 'nullable|date',
            'duracion' => 'nullable|integer|min:1',
            'category_id' => 'nullable|exists:categories,id', // Corregido: `category_id` en lugar de `categoria`
            'lugar_grabacion' => 'nullable|string|max:255',
        ]);

       // dd($request);
        // Manejo de la imagen del póster
        $peliculaData = $request->except('poster_imagen'); // Excluir la imagen del póster

        if ($request->hasFile('poster_imagen')) {
            $path = $request->file('poster_imagen');
            $nTemporal = Str::slug($request->titulo).now()->format('YmdHis').".".$path->getClientOriginalExtension();
            $path->storeAs('posters', $nTemporal);

            $peliculaData['poster_imagen'] = 'storage/posters/' . $nTemporal;
        }

        // Guardar la película en la base de datos
        Pelicula::create($peliculaData);

        return redirect()->route('admin.peliculas.index')->with('info', 'Película creada con éxito');
    }

    // Mostrar el formulario para editar una película existente
    public function edit(Pelicula $pelicula)
    {
        // Obtener las categorías para el formulario
        $categories = Category::all();

        return view('admin.peliculas.edit', [
            'pelicula' => $pelicula,
            'categories' => $categories
        ]);
    }

    // Actualizar los datos de una película existente
    public function update(Request $request, Pelicula $pelicula)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'video_url' => 'nullable|url',
            'poster_imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'autor' => 'nullable|string|max:255',
            'fecha_creacion' => 'nullable|date',
            'duracion' => 'nullable|integer|min:1',
            'category_id' => 'nullable|exists:categories,id', // Corregido: `category_id` en lugar de `categoria`
            'lugar_grabacion' => 'nullable|string|max:255',
        ]);

        // Actualizar los datos de la película
        $pelicula->titulo = $request->get('titulo');
        $pelicula->descripcion = $request->get('descripcion');
        $pelicula->video_url = $request->get('video_url');
        $pelicula->autor = $request->get('autor');
        $pelicula->fecha_creacion = $request->get('fecha_creacion');
        $pelicula->duracion = $request->get('duracion');
        $pelicula->category_id = $request->get('category_id'); // Corregido: `category_id` en lugar de `categoria`
        $pelicula->lugar_grabacion = $request->get('lugar_grabacion');

        // Manejo de la imagen del póster
        if ($request->hasFile('poster_imagen')) {
            // Eliminar la imagen anterior si existe
            if ($pelicula->poster_imagen) {
                Storage::delete(str_replace('storage/', 'public/', $pelicula->poster_imagen));
            }

            $path = $request->file('poster_imagen')->store('public/posters');
            $pelicula->poster_imagen = str_replace('public/', 'storage/', $path);
        }

        // Guardar los cambios
        $pelicula->save();

        return redirect()->route('admin.peliculas.index')->with('info', 'Película actualizada con éxito');
    }

    // Mostrar los detalles de una película
    public function show($id)
    {
        // Buscar la película por su ID
        $pelicula = Pelicula::findOrFail($id);

        // Retornar la vista con los detalles de la película
        return view('pages.show', compact('pelicula'));
    }

    // Eliminar una película y su imagen del póster
    public function destroy(Pelicula $pelicula)
    {
        if ($pelicula->poster_imagen) {
            Storage::delete(str_replace('storage/', 'public/', $pelicula->poster_imagen));
        }
        $pelicula->delete();

        return redirect()->route('admin.peliculas.index')->with('info', 'Película eliminada con éxito');
    }
}