<x-app-layout>
    <div class="w-full relative">
        <!-- Encabezado con imagen -->
        <!-- Encabezado con imagen -->
        <div class="relative h-72 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/portada.jpg') }}" alt="Encabezado de la página"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="z-10 text-center text-white">
                <h1 class="font-extrabold text-4xl text-red-700">Archivo Fotografico Y Filmico Del Chocó</h1>
                <h2 class="text-xl mt-2">Objetivos</h2>
                <nav class="flex justify-center my-4 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-700"></i>
                            <a href="/" class="hover:text-red-500">Inicio</a> /
                        </li>

                        <li class="inline-flex items-center">
                            <a href="/objetivos" class="hover:text-red-500">Objetivos</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Texto Justificado -->
                <div class="text-lg text-justify text-gray-200 bg-black p-6 rounded-lg shadow-lg w-full">
                    <h3 class="text-2xl font-semibold text-red-500 mb-4">Objetivos Principales</h3>
                    <p class="mt-4">
                        <strong>Conservación y Preservación:</strong> Asegurar la conservación adecuada de documentos
                        audiovisuales históricos y culturales mediante el uso de tecnología avanzada y prácticas de
                        preservación de archivos.
                    </p>
                    <p class="mt-4">
                        <strong>Difusión y Acceso:</strong> Facilitar el acceso a nuestra colección a través de una
                        plataforma en línea intuitiva y de fácil navegación, promoviendo la difusión de nuestro
                        patrimonio cultural a un público amplio.
                    </p>
                    <p class="mt-4">
                        <strong>Educación y Formación:</strong> Desarrollar programas educativos y colaboraciones con
                        instituciones académicas para integrar nuestros recursos en el currículo escolar y
                        universitario, fomentando el aprendizaje sobre la historia y la cultura del Chocó.
                    </p>
                    <p class="mt-4">
                        <strong>Promoción Cultural:</strong> Organizar eventos, exposiciones y actividades que celebren
                        la riqueza cultural del Chocó, promoviendo la participación activa de la comunidad y destacando
                        la importancia de nuestro patrimonio audiovisual.
                    </p>
                </div>

                <!-- Columna de Imágenes -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/expo.jpg') }}" alt="Imagen 1">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/u.jpg') }}" alt="Imagen 2">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/pc.jpg') }}" alt="Imagen 3">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/memoria.jpg') }}" alt="Imagen 4">
                    <img class="w-44 h-44 object-cover rounded-lg shadow-md border-4 border-red-600"
                        src="{{ asset('images/iglesia.jpg') }}" alt="Imagen 5">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
