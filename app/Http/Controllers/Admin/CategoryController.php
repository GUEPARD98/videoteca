<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.create')->only('create', 'store');

        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
        $search = $request->search;


        $categories = Category::where('name', 'LIKE', "%{$search}%")->latest()->paginate();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ], [
            'name.required' => 'Este campo es requerido',
            'slug.required' => 'Colocar la url ',
        ]);


        $category =  Category::create($request->all());

        return redirect()->route('admin.categories.edit',  $category)->with('info', 'La categoria creado con exito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {



        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
        ], [
            'name.required' => 'Este campo es requerido',
            'slug.required' => 'Colocar la url ',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit',  $category)->with('info', 'Se ha acualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoria se ha eliminado con exito');
    }
}
