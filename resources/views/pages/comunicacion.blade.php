<x-app-layout>
    <div class="min-h-screen bg-black text-white">
        <!-- Encabezado con Imagen -->
        <div class="relative bg-cover bg-center h-64 flex items-center"
            style="background-image: url('{{ asset('images/portada.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="font-extrabold text-5xl text-red-500">Archivo Fotografico Y Filmico Del Chocó</h1>
                <h2 class="text-white text-2xl font-medium mt-2">Noticias</h2>
                <nav class="flex justify-center mt-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-500"></i>
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-red-600">
                                Inicio
                            </a>
                        </li>
                        <li class="inline-flex items-center text-gray-500">
                            <span>/</span>
                            <a href="/comunicacion"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-red-600 ml-1">
                                Noticias
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto max-w-6xl">
            <h1 class="text-3xl font-semibold mb-6 text-red-600">Noticias</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{ $posts }}
                @foreach ($posts as $post)
                    <div
                        class="bg-gray-800 border border-gray-700 rounded-lg shadow-xl transform transition-transform hover:scale-105 hover:shadow-2xl hover:border-red-600 overflow-hidden">
                        <div class="relative">
                            <div class="absolute top-0 left-0 bg-red-600 text-white px-3 py-1 rounded-br-lg z-10">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <a href="{{ route('pages.show-comunicacion', $post) }}">
                                <h5 class="mb-2 text-2xl font-bold text-white">{{ $post->name }}</h5>
                            </a>
                            <p class="text-gray-400 mb-4">{!! html_entity_decode(Str::limit($post->extract, 90, '...')) !!}</p>
                            <a href="{{ route('pages.show-comunicacion', $post) }}"
                                class="text-red-600 hover:text-red-400 font-semibold flex items-center">
                                @if ($post->image->url)
                                    <img src="{{ asset('storage/' . $post->image->url) }}" alt="Imagen"
                                        class="w-full h-64 object-cover rounded-t-lg border border-red-600 border-opacity-50 shadow-md hover:shadow-2xl transition-shadow">
                                @else
                                    <img src="{{ asset('images/biblioteca250.jpg') }}" alt="Portada"
                                        class="w-full h-64 object-cover rounded-t-lg border border-red-600 border-opacity-50 shadow-md hover:shadow-2xl transition-shadow">
                                @endif
                                <span class="ml-2">Leer más</span>
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
