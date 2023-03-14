<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.registro');
    }
    public function store(Request $request)
    {
        //dd es una función de laravel que permite debuggear variables
        #dd($request); #me muestra todo el método post que estoy llamando...OJO con los names del formulario!!
        //dd($request->get('pass'));

        $request->request->add(['username' => Str::slug($request->username)]);

        $validated = $request->validate([
            'name' => 'required|min:4',
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|min:6|max:50'

        ]);
        User::create([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Autenticación de Usuarios
        //la función attempt va a intentar autenticar usuarios
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //otra forma de autenticar
        // auth()->attempt($request->only('email', 'password'));


        //Redrireccionamiento de rutas
        return redirect()->route('accesoseguro');
    }
}