<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Clase que se encarga de gestionar la pagina de los programas
 */
class ProgramaController extends Controller
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

        $posts =   Post::where('name', 'LIKE', "%{$search}%")->where('category_id', '=', 4)->latest()->paginate();
        return view('admin.programas.index', ['posts' => $posts, 'categories' => $categories]);
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

        return view('admin.programas.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {


        /*         return $request->file('file');
         */


        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));

            $post->image()->create(['url' => $url]);
        }




        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.programas.edit', $post)->with('info', 'se ha creado el articulo con exito');
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
    public function edit(Post $programa)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.programas.edit', ['programa' => $programa, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $programa)
    {
        $programa->update($request->all());
        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            if ($programa->image) {
                Storage::delete($programa->image->url);
                $programa->image->update([
                    'url' => $url,
                ]);
            } else {
                $programa->image()->create([
                    'url' => $url
                ]);
            }
        }
        /*         $this->authorize('author', $post);
  */
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');


        if ($request->tags) {
            $programa->tags()->sync($request->tags);
        }
        return redirect()->route('admin.programas.edit', ['programa' => $programa, 'tags' => $tags, 'categories' => $categories])->with('info', 'Se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $programa)
    {

        if ($programa->image) {
            Storage::delete($programa->image->url);
        }
        $programa->delete();
        return redirect()->route('admin.programas.index')->with('info', 'La articulo se ha eliminado con exito');
    }
}
