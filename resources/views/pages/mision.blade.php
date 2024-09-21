<x-app-layout>
    <div class="w-full relative">

        <!-- Encabezado con imagen -->
        <div class="relative h-72 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/portada.jpg') }}" alt="Encabezado de la página"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="z-10 text-center text-white">
                <h1 class="font-extrabold text-4xl text-red-700">Archivo Fotografico Y Filmico Del Chocó</h1>
                <h2 class="text-xl mt-2">Misión</h2>
                <nav class="flex justify-center my-4 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-700"></i>
                            <a href="/" class="hover:text-red-500">Inicio</a> /
                        </li>

                        <li class="inline-flex items-center">
                            <a href="/mision" class="hover:text-red-500">Misión</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div
                    class="text-lg text-justify text-gray-200 bg-black p-6 rounded-lg shadow-lg w-full max-w-md md:max-w-lg">
                    <h3 class="text-2xl font-semibold text-red-500 mb-4">Misión:</h3>
                    <p>
                        La Videoteca Cultural y Didáctica del Chocó tiene como misión preservar y promover el cine y la
                        producción audiovisual del Chocó, Colombia. A través de nuestra plataforma en línea, ofrecemos
                        un
                        espacio dedicado a la difusión de obras cinematográficas que reflejan la identidad, la historia
                        y las
                        tradiciones de esta región única. Nuestro objetivo es apoyar y dar visibilidad a los cineastas
                        locales,
                        facilitando el acceso a películas y documentales que capturan la esencia de la vida en el Chocó,
                        y
                        fomentar el interés y la apreciación del cine regional tanto a nivel nacional como
                        internacional.
                    </p>
                </div>
                <div class="flex flex-wrap gap-4 justify-center">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/loteria.jpg') }}" alt="Imagen 1">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/clases.jpg') }}" alt="Imagen 2">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/marcha.jpg') }}" alt="Imagen 3">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/gonza.jpg') }}" alt="Imagen 4">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/utchvieja.jpg') }}" alt="Imagen 4">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-center my-12 flex-col gap-3 items-center">
            <h1 class="text-red-500 text-4xl font-semibold">Nuestra Misión Cultural</h1>
            <h2 class="text-white text-2xl">Preservando la Identidad y Tradición del Chocó</h2>
        </div>

    </div>
</x-app-layout>
