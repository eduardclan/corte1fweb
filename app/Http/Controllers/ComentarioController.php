<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;

class ComentarioController extends Controller
{

        public function store(Request $request, User $user, Post $post)
            {
                $request->validate([
                    'comentario' => 'required',
                ]);

                Comentario::create([
                    'comentario' => $request->comentario,
                    'post_id' => $post->id,
                    'user_id' => auth()->user()->id,
                ]);

                return back();
            }

            public function destroy(Comentario $comentario)
            {
                // Verifica si el usuario tiene permiso para eliminar el comentario
                //$this->authorize('delete', $comentario);

                // Elimina el comentario de la base de datos
                $comentario->delete();

                // Redirige de vuelta a la página de la publicación con un mensaje de éxito
                return back();
            }

}
