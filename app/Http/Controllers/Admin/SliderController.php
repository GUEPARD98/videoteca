<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreSliderRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*     public function __construct()
    {
        $this->middleware('can:admin.sliderss.index')->only('index');
        $this->middleware('can:admin.sliderss.create')->only('create', 'store');

        $this->middleware('can:admin.sliderss.edit')->only('edit', 'update');
        $this->middleware('can:admin.sliderss.destroy')->only('destroy');
    } */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::pluck('name', 'id');

        $sliders =   Post::where('name', 'LIKE', "%{$search}%")->where('category_id', '=', 2)->latest()->paginate();
        return view('admin.sliders.index', ['sliders' => $sliders, 'categories' => $categories]);
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

        return view('admin.sliders.create', ['categories' => $categories, 'tags' => $tags]);
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
        return redirect()->route('admin.sliders.edit', ['post' => $post])->with('info', 'se ha creado el articulo con exito');
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

        /*         return view('admin.sliderss.show', ['post' => $post]);
 */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $slider)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.sliders.edit', ['slider' => $slider, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSliderRequest $request, Post $slider)
    {




        $slider->update($request->all());
        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            if ($slider->image) {
                Storage::delete($slider->image->url);
                $slider->image->update([
                    'url' => $url,
                ]);
            } else {
                $slider->image()->create([
                    'url' => $url
                ]);
            }
        }

        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');


        if ($request->tags) {
            $slider->tags()->sync($request->tags);
        }
        return redirect()->route('admin.sliders.edit', ['slider' => $slider, 'tags' => $tags, 'categories' => $categories])->with('info', 'Se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $slider)
    {

        if ($slider->image) {
            Storage::delete($slider->image->url);
        }
        $slider->delete();


        return redirect()->route('admin.sliders.index')->with('info', 'La articulo el carrucel se ha eliminado con exito');
    }
}
