<x-app-layout>
    <div class="min-h-screen bg-black text-white">
        <!-- Encabezado con imagen -->
        <div class="relative bg-cover bg-center h-64 flex items-center"
            style="background-image: url('{{ asset('images/portada.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container mx-auto px-4 relative z-10">
                <h1 class="font-extrabold text-5xl text-red-500">Videoteca</h1>
                <h2 class="text-white text-2xl font-medium mt-2">Nuestra Colección</h2>
                <nav class="flex mt-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-500"></i>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-red-600">
                                Inicio
                            </a>
                        </li>
                        <li class="inline-flex items-center text-white">
                            <span>/</span>
                            <a href="{{ url('/peliculas') }}"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-red-600 ml-1">
                                Videoteca
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto max-w-6xl">
            <h1 class="text-3xl font-semibold mb-6 text-red-600">Lista de Films</h1>

            <!-- Formulario de búsqueda -->
            <form action="{{ route('admin.peliculas.index') }}" method="GET" class="mb-6">
                <div class="flex flex-col md:flex-row items-center md:space-x-4">
                    <input type="text" name="search" placeholder="Buscar por título, descripción, autor..."
                        value="{{ request()->input('search') }}"
                        class="w-full md:w-1/3 p-3 bg-gray-800 border border-gray-700 rounded-lg mb-4 md:mb-0 text-white placeholder-gray-400">

                    <select name="category"
                        class="w-full md:w-1/3 p-3 bg-gray-800 border border-gray-700 rounded-lg mb-4 md:mb-0 text-white">
                        <option value="" disabled selected>Categoría</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ request()->input('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    <input type="date" name="fecha_creacion" placeholder="Fecha de lanzamiento"
                        value="{{ request()->input('fecha_creacion') }}"
                        class="w-full md:w-1/3 p-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400">

                    <button type="submit"
                        class="mt-4 md:mt-0 p-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-500">
                        Buscar
                    </button>
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($peliculas as $pelicula)
                    <div
                        class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                        <div class="relative">
                            <div class="absolute top-0 left-0 bg-red-600 text-white px-3 py-1 rounded-br-lg z-10">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ $pelicula->fecha_creacion ? $pelicula->fecha_creacion->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <!-- Imagen del Póster con borde y sombra -->
                            <a href="{{ route('pages.show', $pelicula) }}">
                                <img src="{{ asset($pelicula->poster_imagen) }}" alt="Portada"
                                    class="w-full h-64 object-cover rounded-t-lg border-b border-gray-700">
                            </a>
                        </div>
                        <div class="p-6">
                            <a href="{{ route('pages.show', $pelicula) }}">
                                <h5 class="mb-2 text-2xl font-bold text-white">{{ $pelicula->titulo }}</h5>
                            </a>
                            <p class="text-gray-400 mb-4">{!! html_entity_decode(Str::limit($pelicula->descripcion, 90, '...')) !!}</p>
                            <a href="{{ route('pages.show', $pelicula) }}"
                                class="text-red-600 hover:text-red-400 font-semibold">
                                Ver más <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $peliculas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
