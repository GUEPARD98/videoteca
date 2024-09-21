<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Archivo;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');

        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::pluck('name', 'id');

        $posts =   Post::where('name', 'LIKE', "%{$search}%")->where('category_id', '=', 3)->latest()->paginate();
        return view('admin.educacion.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.educacion.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {


        $educacion = Post::create($request->all());

        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            $educacion->image()->create(['url' => $url]);
        }

        if ($request->file('file2')) {
            $url =  Storage::put('public/posts', $request->file('file2'));

            $archivo = new Archivo;
            $archivo->url = $url;

            $archivo->imageable()->associate($educacion);
            $archivo->save();
        }




        if ($request->tags) {
            $educacion->tags()->attach($request->tags);
        }
        return redirect()->route('admin.educacion.edit', $educacion)->with('info', 'se ha creado el articulo sobre educación con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        /*         return view('admin.posts.show', ['post' => $post]);
 */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $educacion)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.educacion.edit', ['educacion' => $educacion, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $educacion)
    {
        $educacion->update($request->all());

        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            if ($educacion->image) {
                Storage::delete($educacion->image->url);
                $educacion->image->update([
                    'url' => $url,
                ]);
            } else {
                $educacion->image()->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->file('file2')) {
            $url =  Storage::put('public/archivos', $request->file('file2'));

            if ($educacion->archivo) {
                Storage::delete($educacion->archivo->url);
                $educacion->archivo->update([
                    'url' => $url,
                ]);
            } else {
                $archivo = new Archivo;
                $archivo->url = $url;

                $archivo->imageable()->associate($educacion);
                $archivo->save();
            }
        }

        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');


        if ($request->tags) {
            $educacion->tags()->sync($request->tags);
        }
        return redirect()->route('admin.educacion.edit', ['educacion' => $educacion, 'tags' => $tags, 'categories' => $categories])->with('info', 'Se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $educacion)
    {

        if ($educacion->image) {
            Storage::delete($educacion->image->url);
        }
        $educacion->delete();
        return redirect()->route('admin.educacion.index')->with('info', 'La articulo se ha eliminado con exito');
    }
}
