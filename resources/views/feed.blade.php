@extends('layoutprincipal')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feed Principal</div>

                    <div class="card-body">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <div class="post">
                                    <h4>{{ $post->title }}</h4>
                                    <p>{{ $post->content }}</p>
                                    
                                    <div class="bg-white mt-3">
                                        <img class="border rounded-t-lg shadow-lg " src="{{asset('uploads').'/'. $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                                        <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
                                            {{$post->descripcion}} | Publicado por: {{ $post->user->name }}
                                        </div>
                                        <div class="bg-white p-1 border shadow flex flex-row flex-wrap">
                                          <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Me gusta</div>
                                          <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Compartir</div>
                                          <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comentarios</div>
                                        </div>
                                        
                                        <div class="bg-white border-4 bg-gray-300 border-white rounded-b-lg shadow p-5 text-xl text-gray-700 content-center font-semibold flex flex-row flex-wrap">
                                          <div class="w-full">
                                            <div class="w-full text-left text-xl text-gray-600">
                                                @if ($post->comentarios->count())

                                                @foreach ($post->comentarios as $comentario)
                                            
                                                <div class ="p-5">
                                            
                                                  {{$comentario->user->username}}
                                                  </a>
                                            
                                                  <p>{{$comentario->comentario}}
                                                  </p>
                                            
                                                  <p class="text-sm">{{$comentario->created_at->diffForHumans()}}
                                                  </p>
                                                                                        
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
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <p>No hay publicaciones en el feed.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    
        
        <!-- Begin Navbar -->
        
        <div class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
          <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
        </div>
        
        <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
          <div class="p-5 bg-white sticky top-0">
            <img class="border border-indigo-100 shadow-lg round" src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg">
            <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
              Some Person
            </div>
          </div>
          <div class="w-full h-screen antialiased flex flex-col hover:cursor-pointer">
            <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-comment text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Messages</a>
            <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-cog text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Settings</a>
            <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-arrow-left text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Log out</a>
          </div>
        </div>
        
        <!-- End Navbar -->
        
        <div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
          <div class="bg-white w-full shadow rounded-lg p-5">
            <label class="bg-gray-200 w-full rounded-lg shadow border p-2" rows="5">New Post!</label>
            
            <div class="w-full flex flex-row flex-wrap mt-3">
                <a href="{{route('publicaciones.create')}}" class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">Crear Publicación</a>
            </div>
          </div>
          
          <div class="mt-3 flex flex-col">
            
            
            <div class="bg-white mt-3">
              <img class="border rounded-t-lg shadow-lg " src="https://images.unsplash.com/photo-1572817519612-d8fadd929b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
              <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
                A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
              </div>
              <div class="bg-white p-1 border shadow flex flex-row flex-wrap">
                <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
              </div>
              
              <div class="bg-white border-4 bg-gray-300 border-white rounded-b-lg shadow p-5 text-xl text-gray-700 content-center font-semibold flex flex-row flex-wrap">
                <div class="w-full">
                  <div class="w-full text-left text-xl text-gray-600">
                    @Some Person
                  </div>
                  A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
                  A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
                </div>
              </div>
            </div>
            
            
            <div class="bg-white mt-3">
              <img class="border rounded-t-lg shadow-lg " src="https://images.unsplash.com/photo-1572817519612-d8fadd929b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
              <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
                A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
              </div>
              <div class="bg-white p-1 rounded-b-lg border shadow flex flex-row flex-wrap">
                <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
              </div>
            </div>
            
            
            <div class="bg-white mt-3">
              <img class="border rounded-t-lg shadow-lg " src="https://images.unsplash.com/photo-1572817519612-d8fadd929b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
              <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
                A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
              </div>
              <div class="bg-white p-1 rounded-b-lg border shadow flex flex-row flex-wrap">
                <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
                <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      </div>