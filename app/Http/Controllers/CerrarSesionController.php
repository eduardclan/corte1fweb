<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CerrarSesionController extends Controller
{
    public function store() {
        //dd('Cerrando la sesión');
        auth()->logout();
        return redirect()->route('sesion');
    }
}
