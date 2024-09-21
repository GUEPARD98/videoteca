<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Counter;
use Illuminate\Http\Request;
use App\Models\Pelicula; // Importar el modelo Pelicula

class FrontController extends Controller
{
    public function index(Request $request)
    {

        $sliders = Post::where('status', 2)->where('category_id', '=', 2)->latest()->paginate(6);
        $posts = Post::where('status', 2)->where('category_id', '=', 1)->latest()->paginate(8);

        return view('pages.home', ['posts' => $posts, 'postsSlider' => $sliders]);
    }


      // Función para listar todas las películas
      public function showMovies()
      {

          $categories = Category::all();
          $peliculas = Pelicula::paginate(); // Obtener todas las películas desde la base de datos
          return view('pages.peliculas', compact('peliculas', 'categories')); // Pasar las películas a la vista 'pages.peliculas'
      }
      public function show($id)
      {
          // Buscar la película por su ID
          $pelicula = Pelicula::findOrFail($id);

          // Retornar la vista con los detalles de la película
          return view('pages.show', compact('pelicula'));
      }


    public function comunicacion()
    {
        $posts = Post::where('status', 2)->where('category_id', '=', 1)->latest()->paginate(8);
        return view('pages.comunicacion', ['posts' => $posts]);
    }

    public function contratacion()
    {
        $posts2023 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2023')->latest()->paginate();
        $posts2024 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2024')->latest()->paginate();
        $posts2025 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2025')->latest()->paginate();

        return view('pages.contratacion', ['posts2023' => $posts2023, 'posts2024' => $posts2024, 'posts2025' => $posts2025]);
    }

    public function show_contratacion(Post $post)
    {
        $posts2023 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2023')->latest()->paginate();
        $posts2024 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2024')->latest()->paginate();
        $posts2025 = Post::where('status', 2)->where('category_id', '=', 5)->where('vigencia', '=', '2025')->latest()->paginate();

        return view('pages.show-contratacionn', ['posts2023' => $posts2023, 'posts2024' => $posts2024, 'posts2025' => $posts2025, 'post' => $post]);
    }

    public function show_comunicacion(Post $post)
    {
        return view('pages.show-comunicacion', ['post' => $post]);
    }

    public function show_educacion(Post $post)
    {
        return view('pages.show-educacion', ['post' => $post]);
    }

    public function show_convocatoria(Post $post)
    {
        return view('pages.show-convocatoria', ['post' => $post]);
    }

    public function show_programa(Post $post)
    {
        return view('pages.show-programa', ['post' => $post]);
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'description' => 'required',
        ], [
            'description.required' => 'Este campo es requerido',
        ]);

        $comentario = new Comment();
        $comentario->description = $request->description;
        $comentario->role = $request->role;
        $comentario->parent_id = $request->parent_id;
        $comentario->post_id = $request->post_id;

        $user_id = \Auth()->id() ?: 2;
        $comentario->user_id = $user_id;

        $post->comments()->save($comentario);

        return redirect()->back()->with('info', 'Comentario recibido con éxito');
    }

    public function educacion()
    {
        $posts = Post::where('category_id', '=', 3)->latest()->paginate(2);
        return view('pages.educacion', ['posts' => $posts]);
    }

    public function programas()
    {
        $posts = Post::where('category_id', '=', 4)->latest()->paginate();
        return view('pages.programas', ['posts' => $posts]);
    }

    public function vision()
    {
        return view('pages.vision');
    }

    public function convocatoria()
    {
        $posts = Post::where('category_id', '=', 4)->latest()->paginate(2);
        return view('pages.convocatoria', ['posts' => $posts]);
    }

    public function estructura()
    {
        return view('pages.estructura');
    }

    public function contactanos()
    {
        return view('pages.contactanos');
    }

    public function objetivo()
    {
        return view('pages.objetivo');
    }

    public function mision()
    {
        return view('pages.mision');
    }

    public function prensa()
    {
        return view('pages.sala-prensa');
    }

    public function show_articulo(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)
                         ->where('status', 2)
                         ->where('id', '!=', $post->id)
                         ->take(5)
                         ->get();

        $this->authorize('published', $post);

        return view('posts.show', ['post' => $post, 'similares' => $similares]);
    }

    public function show_similar(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)
                         ->where('status', 2)
                         ->where('id', '!=', $post->id)
                         ->take(5)
                         ->get();

        $this->authorize('published', $post);

        return view('posts.show-similar', ['post' => $post, 'similares' => $similares]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $posts = Post::where('status', 2)
                     ->where(function($query) use ($search) {
                         $query->where('name', 'LIKE', "%{$search}%")
                               ->orWhere('body', 'LIKE', "%{$search}%")
                               ->orWhere('extract', 'LIKE', "%{$search}%");
                     })
                     ->latest()
                     ->paginate(5);

        return view('posts.search', ['posts' => $posts, 'search' => $search]);
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(6);
        return view('posts.tags', ['posts' => $posts, 'tag' => $tag]);
    }

    public function slider()
    {
        $posts = Post::where('status', 2)->where('category_id', '=', 2)->latest()->paginate(6);
        return view('pages.home', ['postsSlider' => $posts]);
    }

    public function documents()
    {
        $archivos = Document::latest()->paginate();
        return view('pages.documents', ['archivos' => $archivos]);
    }

    public function programs()
    {
        return view('pages.documents');
    }

    public function counter(Request $request)
    {
        if (!$request->cookie('visited')) {
            $cookie = cookie('visited', uniqid(), 60);
            $counters = Counter::latest()->paginate(1);
            $views = 0;
            foreach ($counters as $key => $value) {
                $views = $value;
            }
            $views = intval($views['views']) + 1;
            $counter = new Counter();
            $counter->views = $views;
            $counter->save();
            return response('Contador actualizado')->withCookie($cookie);
        }
    }
}