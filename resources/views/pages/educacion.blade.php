<x-app-layout>
    <div class="min-h-screen bg-black text-white">
        <!-- Encabezado con imagen -->
        <div class="relative bg-cover bg-center h-80 flex items-center"
            style="background-image: url('{{ asset('images/portada.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-70"></div>
            <div class="container mx-auto px-4 relative z-10">
                <h1 class="font-extrabold text-5xl text-red-500">Archivo Fotografico Y Filmico Del Chocó</h1>
                <h2 class="text-2xl mt-4 text-white">Periodismo, Grabación y Prensa</h2>
                <p class="mt-2 text-lg text-gray-200">Te asesoramos y enseñamos. ¡Contrátanos!</p>
                <nav class="flex mt-6 justify-center" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2 text-sm font-medium text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-500"></i>
                            <a href="/" class="hover:text-red-500">Inicio</a>
                            <span class="text-gray-500 mx-2">/</span>
                        </li>
                        <li>
                            <a href="/contactanos" class="hover:text-red-500">Servicios</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-12 mx-auto max-w-6xl px-6 lg:px-8">
            <h1 class="text-3xl font-semibold mb-6 text-red-500">Nuestros Servicios</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Preservación y Restauración -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Preservación y Restauración</h2>
                        <p class="text-gray-400 mb-6">
                            Aseguramos la preservación a largo plazo de material audiovisual y ofrecemos servicios de
                            restauración de archivos dañados o deteriorados.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Digitalización -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Digitalización</h2>
                        <p class="text-gray-400 mb-6">
                            Convertimos materiales audiovisuales de formatos físicos a digitales, preservando el
                            patrimonio histórico y facilitando el acceso en línea.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Acceso a Contenidos -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Acceso a Contenidos</h2>
                        <p class="text-gray-400 mb-6">
                            Ofrecemos un catálogo en línea, servicios de préstamo de películas, y streaming para que
                            accedas a tus contenidos favoritos desde cualquier lugar.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Asesorías y Formación -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Asesorías y Formación</h2>
                        <p class="text-gray-400 mb-6">
                            Te ofrecemos asesoría en producción audiovisual, edición, postproducción y periodismo
                            audiovisual. Aprende a crear contenido de calidad con nosotros.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Organización de Eventos Culturales -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Organización de Eventos Culturales</h2>
                        <p class="text-gray-400 mb-6">
                            Organizamos proyecciones, ciclos de cine, festivales y conferencias para promover la cultura
                            y el patrimonio audiovisual.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Investigación y Educación -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Investigación y Educación</h2>
                        <p class="text-gray-400 mb-6">
                            Apoyamos la investigación académica y cultural, y ofrecemos talleres educativos sobre la
                            historia del cine y la producción audiovisual.
                        </p>
                        <a href="#" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Gestión de Archivos -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Gestión de Archivos</h2>
                        <p class="text-gray-400 mb-6">
                            Servicios de catalogación, almacenamiento y consultoría para la correcta gestión y
                            preservación de archivos audiovisuales.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Producción de Contenidos -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Producción de Contenidos</h2>
                        <p class="text-gray-400 mb-6">
                            Ofrecemos servicios de producción audiovisual, desde la preproducción hasta la
                            postproducción, para la creación de documentales, películas y más.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Servicios de Prensa y Comunicación -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Servicios de Prensa y Comunicación</h2>
                        <p class="text-gray-400 mb-6">
                            Te ayudamos a gestionar relaciones con medios, crear contenido para prensa y destacar en el
                            ámbito mediático.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Comercialización de Contenidos -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative p-6">
                        <h2 class="text-2xl font-bold text-white mb-4">Comercialización de Contenidos</h2>
                        <p class="text-gray-400 mb-6">
                            Distribuimos y vendemos películas, documentales y otros productos audiovisuales, tanto en
                            formato físico como digital.
                        </p>
                        <a href="/contactanos" class="text-red-600 hover:text-red-400 font-semibold">
                            Más información <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt
-12 text-center">
                <a href="/contactanos"
                    class="bg-red-600 hover:bg-red-500 text-white py-3 px-6 rounded-full text-lg font-semibold">
                    Contáctanos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
