@extends('layoutprincipal')

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
                <input class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="submit" value="Regresar">
                    </form>
                    <a href="" class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">Crear Comentario</a>
                </div>
            </div>
            </div>
            <div class="text-center mt-12">
                <h4 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                    ¡Hola, aqui puedes crear un nuevo post {{auth()->user()->username}}!
                </h4>

                <!-- component -->
                <section class="bg-gray-10 ">
                    <div class="flex justify-center h-screen w-screen items-center">
                    <div class="w-full md:w-1/2 flex flex-col items-center " >

                        <!-- titulo general -->
                        <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">NUEVA PUBLICACIÓN</h1>
                        <br>
                        <br>

                        <!-- imagen -->
                        <div class=" flex items-center gap-x-1">
                            <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Imagen</label>
                        </div>
                        <div class="w-3/4 mb-6">
                            <form action= "{{route('imagenes.store')}}" method="POST" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col
                            justify-center items-center">
                            @csrf
                            </form>
                        </div>

                        <form action="{{route("publicaciones.store")}}" method="POST">
                            @vite('resources/js/app.js')
                            @csrf
                            

                        <!-- Titulo input -->
                        <div class=" flex items-center gap-x-1">
                            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Titulo</label>
                        </div>
                        <div class="w-3/4 mb-6">
                            <input type="text" name="titulo" id="exampleFormControlInput2" class="w-full py-4 px-8 bg-slate-200 placeholder:font-semibold rounded hover:ring-1 outline-blue-500" placeholder="Nombre publicación">
                        </div>
                        <!-- textarea -->
                        <div class=" flex items-center gap-x-1">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción</label>
                        </div>
                        <div class="w-3/4 mb-6">
                        <textarea name="descripcion" id="exampleFormControlInput2" rows="4" class="w-full py-4 px-8 bg-slate-200 placeholder:font-semibold rounded hover:ring-1 outline-blue-500" placeholder="tu descripción..."></textarea>
                        </div>
                        <div class="mb-6">
                            <input name="imagen" type="hidden" value="{{old('imagen')}}">
                        </div>
                        <!-- button -->
                        <div class="w-1/4 mt-4">
                            <input type="submit" class="py-4 bg-blue-400 w-full rounded text-blue-50 font-bold hover:bg-blue-700" value="PUBLICAR">
                        </div>
                        </form>
                    </div>
                    </div>
                </section>
            </div>
        </div>
        </div>
    </div>
    </section>
    @endauth
</main>
</body>
