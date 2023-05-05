
@section('dash')
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141734189-9');
</script>

<script>
    
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('v2fLMH8w3xgUEQcl63H9');
    } else {
        document.documentElement.classList.remove('v2fLMH8w3xgUEQcl63H9')
    }
</script>
</head>
<body class="jtAJHOc7mn7b4IKRO59D _1jTZ8KXRZul60S6czNi">
<!--inicio del nav-->

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://static1.educaedu-colombia.com/adjuntos/12/00/28/universidad-santo-tom-s---seccional-bucaramanga-002872_large.jpg');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
</div>
</section>
<section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
            <div class="relative">
                <img alt="..." src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
            </div>
            </div>
            @auth
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
            <div class="py-6 px-3 mt-32 sm:mt-0">
                <form action="{{route("logout")}}" method="POST">
                @csrf
                <input class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="submit" value="Cerrar sesión">
                </form>
                <a href="" class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">Crear Comentario</a>
            </div>
            </div>
            @endauth
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
</section>
</main>
</body>


            <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                <div class="relative h-32 w-32 ...">
                    <div class="inset-x-0 top-0 h-16 font-sans text-3xl">
                        {{$post->titulo}}
                </div>

                <br>
                <br>
                <br>

                <div class="container mx-auto flex">
                    <div class="md:w-1/2">                     

                        <img src="{{asset('uploads').'/'. $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                
                        <div class="p-4">
                            0 likes, gas!
                        </div>
                
                        <div>
                            <p class="font-bold">{{$post->user->username}}</p>
                            <p class="font-sans">{{$post->created_at->diffForHumans()}}</p>
                            <br>
                            <p class="font-sans font-style:italic">{{$post->descripcion}}</p>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-10">

                      <div class="shadow p-5 mb-5" >

                        
                            <div class="row">
                              <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                  <div class="panel-heading">Crear Comentario</div>
                                  <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="{{route('comments.store',['post'=>$post, 'user'=>$user])}}">
                                      {{ csrf_field() }}
                        
                                      <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
                                        <label for="comentario" class="col-md-4 control-label">Contenido</label>
                        
                                        <div class="col-md-6">
                                          <textarea id="comentario" class="form-control" name="comentario" required>{{ old('content') }}</textarea>
                        
                                          @if ($errors->has('comentario'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('comentario') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        
                                        <div class="col-md-6 col-md-offset-4">
                                          <button type="submit" class="btn btn-primary">
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

                </div>
              </div>
            </div> 
