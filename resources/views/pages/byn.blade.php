<x-app-layout>
    <div class="w-full relative">
        <!-- Encabezado con imagen -->
        <div class="relative h-72 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/portada.jpg') }}" alt="Encabezado de la página"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="z-10 text-center text-white">
                <h1 class="font-extrabold text-4xl text-red-700">Archivo Fotografico Y Filmico Del Chocó</h1>
                <h2 class="text-xl mt-2">Documental: El Chocó en Blanco y Negro</h2>
                <nav class="flex justify-center my-4 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-700"></i>
                            <a href="/" class="hover:text-red-500">Inicio</a> /
                        </li>

                        <li class="inline-flex items-center">
                            <a href="byn" class="hover:text-red-500">Documental</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto px-4 lg:px-8">
            <div class="text-lg text-justify text-gray-200 bg-black p-6 rounded-lg shadow-lg w-full">
                <h3 class="text-2xl font-semibold text-red-500 mb-4">Documental: El Chocó en Blanco y Negro</h3>
                <p>
                    Con una muestra de cada una de estas imágenes y como resultado del trabajo de investigación, se
                    realizó la producción del documental “El Chocó en Blanco y Negro”, elaborado a partir de imágenes de
                    archivos y fotografías.
                </p>
                <p class="mt-4">
                    Estas y otras imágenes sobre acontecimientos de importancia del siglo pasado y hasta nuestros días
                    han sido rescatadas y valoradas como parte de nuestro patrimonio cultural desconocido, que nos
                    enseña a conocernos y a redescubrirnos como pueblos en un trasegar histórico rico y complejo que nos
                    ayuda a entender y seguir construyendo el hilo histórico y cronológico de nuestra historia.
                </p>
                <p class="mt-4">
                    A partir de fotografías e imágenes en movimiento, que hacen parte del patrimonio inmaterial del
                    Chocó, localizados y recuperados por el Archivo Fotográfico y Fílmico del Chocó Biogeográfico de la
                    Universidad Tecnológica del Chocó y la Fundación Beteguma, se realizó el documental “El Chocó en
                    Blanco y Negro”, con 15 mini capítulos y una duración total de 45 minutos.
                </p>
                <p class="mt-4">
                    El documental recrea aspectos vitales en la historia del desarrollo del departamento a principios
                    del siglo pasado, época de auge económico y liderazgo de la clase política en el departamento,
                    impulsado por la presencia de compañías extranjeras dedicadas a la explotación de diversos recursos
                    naturales, en especial el oro.
                </p>
            </div>
        </div>

        <!-- Contenedor de Video -->
        <div class="container py-8 mx-auto px-4 lg:px-8">
            <div class="bg-black p-6 rounded-lg shadow-lg w-full">
                <h3 class="text-2xl font-semibold text-red-500 mb-4">Ver Documental</h3>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe src="https://www.youtube.com/embed/ObfGSqxDqFs"
                        class="w-full h-full rounded-lg shadow-md border-4 border-red-600" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
