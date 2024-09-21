<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all()->count();
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $users = User::all()->count();
       // $comments = Comment::all()->count();
        $documents = Document::all()->count();

        return view('admin.index', compact('tags', 'posts', 'categories', 'users', /*'comments',*/ 'documents'));
    }
}
