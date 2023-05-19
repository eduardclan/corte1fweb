@extends('layoutprincipal')
@section('dash')

<html>
    <head>
        <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />
    </head>
    <body>
      <div class="container mx-auto flex">
        <div class="md:w-1/2 flex flex-col justify-center items-center h-[100vh]">
            <div class="!z-5 relative flex flex-col rounded-[20px] max-w-[400px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 flex flex-col w-full !p-4 3xl:p-![18px] bg-white undefined">
                <div class="h-full w-full">
                    <div class="relative w-full">
                        <img src="{{asset('uploads').'/'. $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                        <button class="absolute top-3 right-3 flex items-center justify-center rounded-full bg-white p-2 text-brand-500 hover:cursor-pointer">
                            <div class="flex h-full w-full items-center justify-center rounded-full text-xl hover:bg-gray-50">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"></path></svg>
                            </div>
                        </button>
                    </div>
                    <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                        <div class="mb-2">
                            <p class="text-lg font-bold text-navy-700"> {{$post->titulo}} </p>
                            <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">{{$post->descripcion}}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between md:items-center lg:justify-between ">
                        <div class="flex">
                            <p class="!mb-0 text-sm font-bold text-brand-500">By {{$post->user->username}}<br><span>{{$post->created_at->diffForHumans()}}</span></p>
                        </div>
                        @auth
                        @if($post->user_id == auth()->user()->id)
                        <form method="POST" action="{{route('publicaciones.destroy', $post)}}">
                          @csrf
                          @method('DELETE')
                          <input type="submit" value="Eliminar post"
                          class="linear rounded-[20px] bg-brand-900 px-4 py-2 text-base font-medium text-white transition duration-200 hover:bg-brand-800 active:bg-brand-700"/>
                        </form>
                        @endif
                        @endauth
                      </div>
                </div>

                <div class="flex flex-row space-x-1">
                  <div
                    class="bg-red-500 shadow-lg shadow- shadow-red-600 text-white cursor-pointer px-3 py-1 text-center justify-center items-center rounded-xl flex space-x-2 flex-row">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M885.9 490.3c3.6-12 5.4-24.4 5.4-37 0-28.3-9.3-55.5-26.1-77.7 3.6-12 5.4-24.4 5.4-37 0-28.3-9.3-55.5-26.1-77.7 3.6-12 5.4-24.4 5.4-37 0-51.6-30.7-98.1-78.3-118.4a66.1 66.1 0 0 0-26.5-5.4H144c-17.7 0-32 14.3-32 32v364c0 17.7 14.3 32 32 32h129.3l85.8 310.8C372.9 889 418.9 924 470.9 924c29.7 0 57.4-11.8 77.9-33.4 20.5-21.5 31-49.7 29.5-79.4l-6-122.9h239.9c12.1 0 23.9-3.2 34.3-9.3 40.4-23.5 65.5-66.1 65.5-111 0-28.3-9.3-55.5-26.1-77.7zM184 456V172h81v284h-81zm627.2 160.4H496.8l9.6 198.4c.6 11.9-4.7 23.1-14.6 30.5-6.1 4.5-13.6 6.8-21.1 6.7a44.28 44.28 0 0 1-42.2-32.3L329 459.2V172h415.4a56.85 56.85 0 0 1 33.6 51.8c0 9.7-2.3 18.9-6.9 27.3l-13.9 25.4 21.9 19a56.76 56.76 0 0 1 19.6 43c0 9.7-2.3 18.9-6.9 27.3l-13.9 25.4 21.9 19a56.76 56.76 0 0 1 19.6 43c0 9.7-2.3 18.9-6.9 27.3l-14 25.5 21.9 19a56.76 56.76 0 0 1 19.6 43c0 19.1-11 37.5-28.8 48.4z"></path></svg>
                    <span>23</span>
                  </div>

                  <form action="{{ route('likes.store', ['post'=>$post])}}" method="POST">
                    @csrf
                  <div
                    class="bg-green-500 shadow-lg shadow- shadow-green-600 text-white cursor-pointer px-3 text-center justify-center items-center py-1 rounded-xl flex space-x-2 flex-row">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M885.9 533.7c16.8-22.2 26.1-49.4 26.1-77.7 0-44.9-25.1-87.4-65.5-111.1a67.67 67.67 0 0 0-34.3-9.3H572.4l6-122.9c1.4-29.7-9.1-57.9-29.5-79.4A106.62 106.62 0 0 0 471 99.9c-52 0-98 35-111.8 85.1l-85.9 311H144c-17.7 0-32 14.3-32 32v364c0 17.7 14.3 32 32 32h601.3c9.2 0 18.2-1.8 26.5-5.4 47.6-20.3 78.3-66.8 78.3-118.4 0-12.6-1.8-25-5.4-37 16.8-22.2 26.1-49.4 26.1-77.7 0-12.6-1.8-25-5.4-37 16.8-22.2 26.1-49.4 26.1-77.7-.2-12.6-2-25.1-5.6-37.1zM184 852V568h81v284h-81zm636.4-353l-21.9 19 13.9 25.4a56.2 56.2 0 0 1 6.9 27.3c0 16.5-7.2 32.2-19.6 43l-21.9 19 13.9 25.4a56.2 56.2 0 0 1 6.9 27.3c0 16.5-7.2 32.2-19.6 43l-21.9 19 13.9 25.4a56.2 56.2 0 0 1 6.9 27.3c0 22.4-13.2 42.6-33.6 51.8H329V564.8l99.5-360.5a44.1 44.1 0 0 1 42.2-32.3c7.6 0 15.1 2.2 21.1 6.7 9.9 7.4 15.2 18.6 14.6 30.5l-9.6 198.4h314.4C829 418.5 840 436.9 840 456c0 16.5-7.2 32.1-19.6 43z"></path></svg>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button type="submit">Me gusta</button>
                  </div>
                  </div>
                </form>

                <span>{{$post->likes->count()}} Me gusta</span>
                
              

                <p class="font-normal text-navy-700 mt-20 mx-auto w-max">Regresar al <a href="" target="_blank" class="text-brand-500 font-bold">Dashboard</a></p>
            </div> 
        </div>  
      
    

<!--comentarios-->
<div class="md:w-1/2 p-10">
  <div class="shadow p-5 mb-5" >
    <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading mb-6 text-2xl font-medium text-center">Escribe un comentario</div>
              <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('comments.store',['post'=>$post, 'user'=>$user])}}">
                  {{ csrf_field() }}
    
                  <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
                    <label for="comentario" class="col-md-4 control-label">Contenido</label>
    
                        <div class="col-md-6">
                        <textarea id="comentario" class="w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" name="comentario" required>{{ old('content') }}</textarea>
            
                              @if ($errors->has('comentario'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('comentario') }}</strong>
                                </span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group">
                            
                            <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="text-white px-4 py-3 bg-blue-500  rounded-lg">
                                Guardar Comentario
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--comentarios-->

        <h3>Comentarios</h3>                        
        @if ($post->comentarios->count())

        @foreach ($post->comentarios as $comentario)
    
        <div class ="p-5">
    
          <a href= "{{route('comments.store',['post'=>$post, 'user' => $user], $comentario->user)}}" class="mb-1 block uppercase text-gray-900 font-bold">
          {{$comentario->user->username}}
          </a>
    
          <p>{{$comentario->comentario}}
          </p>
    
          <p class="text-sm">{{$comentario->created_at->diffForHumans()}}
          </p>
          
          <form action="{{ route('comments.destroy', [$comentario]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Eliminar comentario</button>
          </form>                        

            </div>
            @endforeach
          @else
          
          <p class="p-10 text-center"> Aún no han comentado esta foto </p>
          @endif
        
        </div>

            </div>


</body>
</html>
