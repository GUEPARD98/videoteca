<x-app-layout>
    <!-- Encabezado con Imagen -->
    <div class="relative bg-cover bg-center h-96 flex items-center overflow-hidden"
        style="background-image: url('{{ asset('images/portada.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="font-extrabold text-7xl text-red-500 mb-2 drop-shadow-lg">{{ $pelicula->titulo }}</h1>
            <h2 class="text-white text-4xl font-medium drop-shadow-lg">Videoteca Cinemática</h2>
            <nav class="flex justify-center mt-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                    <li class="inline-flex items-center gap-2">
                        <i class="fa-solid fa-house text-red-500"></i>
                        <a href="{{ url('/') }}"
                            class="inline-flex items-center text-sm font-medium text-white hover:text-red-600 transition-colors">
                            Inicio
                        </a>
                    </li>
                    <li class="inline-flex items-center text-white">
                        <span>/</span>
                        <a href="{{ url('/peliculas') }}"
                            class="inline-flex items-center text-sm font-medium text-white hover:text-red-600 ml-1 transition-colors">
                            Videoteca
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto py-8">
        <div class="bg-gray-900 text-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col lg:flex-row lg:space-x-8">
                <!-- Imagen del Póster -->
                @if ($pelicula->poster_imagen)
                    <div class="flex-shrink-0 mb-6 lg:mb-0 lg:w-1/3">
                        <img src="{{ asset($pelicula->poster_imagen) }}" alt="{{ $pelicula->titulo }}"
                            class="w-full h-80 object-cover rounded-lg shadow-md border-4 border-red-600">
                    </div>
                @endif

                <!-- Información de la Película -->
                <div class="flex-1 p-6">
                    <h1 class="text-5xl font-bold text-red-500 mb-4">{{ $pelicula->titulo }}</h1>

                    <!-- Descripción de la Película -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Descripción:</strong> {{ $pelicula->descripcion }}
                    </p>

                    <!-- Autor -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Autor:</strong> {{ $pelicula->autor }}
                    </p>

                    <!-- Categoría -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Categoría:</strong> {{ $pelicula->category->name }}
                    </p>

                    <!-- Duración -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Duración:</strong> {{ $pelicula->duracion }} minutos
                    </p>

                    <!-- Lugar de Grabación -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Lugar de Grabación:</strong> {{ $pelicula->lugar_grabacion }}
                    </p>

                    <!-- Fecha de Creación -->
                    <p class="text-gray-300 text-lg mb-4 text-justify">
                        <strong>Fecha de Creación:</strong>
                        @if ($pelicula->fecha_creacion)
                            {{ $pelicula->fecha_creacion->locale('es')->translatedFormat('d F Y') }}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Video -->
            <div class="p-6 bg-gray-800 border-t border-red-600">
                <div class="relative pt-6 pb-6">
                    @php
                        $url = $pelicula->video_url;
                        $embedCode = '';

                        // Detectar y generar código de incrustación para diferentes plataformas
                        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://www.youtube.com/embed/' .
                                $matches[1] .
                                '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        } elseif (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://player.vimeo.com/video/' .
                                $matches[1] .
                                '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
                        } elseif (preg_match('/dailymotion\.com\/video\/([^_]+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" frameborder="0" src="https://www.dailymotion.com/embed/video/' .
                                $matches[1] .
                                '" allowfullscreen></iframe>';
                        } elseif (preg_match('/twitch\.tv\/videos\/(\d+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://player.twitch.tv/?video=' .
                                $matches[1] .
                                '" frameborder="0" scrolling="no" allowfullscreen></iframe>';
                        } elseif (preg_match('/facebook\.com\/.*\/videos\/(\d+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/facebook/videos/' .
                                $matches[1] .
                                '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; clipboard-write; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
                        } elseif (preg_match('/vid\.me\/v\/([a-zA-Z0-9]+)/', $url, $matches)) {
                            $embedCode =
                                '<a href="' .
                                $url .
                                '" target="_blank" class="text-red-500 hover:underline">Download Video</a>';
                        } elseif (preg_match('/tiktok\.com\/@.*\/video\/(\d+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://www.tiktok.com/embed/' .
                                $matches[1] .
                                '" frameborder="0" scrolling="no" allow="accelerometer; autoplay; encrypted-media; clipboard-write; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
                        } elseif (preg_match('/mixcloud\.com\/.*\/.*\/(\d+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-24 lg:h-32" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&light=1&url=https://www.mixcloud.com/' .
                                $matches[1] .
                                '" frameborder="0" allow="autoplay"></iframe>';
                        } elseif (preg_match('/d.tube\/v\/([^\/]+)/', $url, $matches)) {
                            $embedCode =
                                '<iframe class="w-full h-96" src="https://d.tube/#!/v/' .
                                $matches[1] .
                                '" frameborder="0" allowfullscreen></iframe>';
                        } elseif (preg_match('/flickr\.com\/photos\/([^\/]+)\/albums/', $url)) {
                            // Código de incrustación para Flickr
                            $embedCode =
                                '<iframe class="w-full h-96" src="' .
                                $url .
                                '" frameborder="0" allowfullscreen></iframe>';
                        } else {
                            $embedCode = '<p class="text-white">Video no disponible o formato no soportado.</p>';
                        }
                    @endphp

                    {!! $embedCode !!}
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.peliculas.index') }}" class="text-red-500 hover:underline"><b>← Volver a la
                    lista</b></a>
        </div>
    </div>
</x-app-layout>
