<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // Recuperar todas las publicaciones ordenadas por fecha descendente
        $posts = Post::orderBy('created_at', 'desc')->get();
        //dd('hola');
        return view('feed', compact('posts'));
    }
}
