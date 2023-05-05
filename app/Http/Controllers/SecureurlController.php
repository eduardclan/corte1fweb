<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class SecureurlController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {   
        $posts = Post::where('user_id', $user->id)->paginate(4);
        //dd($posts);
        
        //dd($user->username);
        return view('dashboard', ['user' => $user,
        'posts' => $posts]);
    }

    public function create() {
        return view('publicaciones.create');
    }

    public function store(Request $request)
    {
        //return dd('creando publicación');
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('accesoseguro', ['user' => auth()->user()->username]);
        
    }

    public function show(User $user, Post $post)
    {  
        return view('publicaciones.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}