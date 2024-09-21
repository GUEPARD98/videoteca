<x-app-layout>
    <div class="w-full relative">
        <!-- Encabezado con imagen -->
        <div class="relative h-72 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/portada.jpg') }}" alt="Encabezado de la página"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="z-10 text-center text-white">
                <h1 class="font-extrabold text-4xl text-red-700">Archivo Fotografico Y Filmico Del Chocó</h1>
                <nav class="flex justify-center my-4 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house text-red-700"></i>
                            <a href="/" class="hover:text-red-500">Inicio</a> /
                        </li>

                        <li class="inline-flex items-center">
                            <a href="/tenemos" class="hover:text-red-500">Archivo Fílmico</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container py-8 mx-auto px-4 lg:px-8">
            <div class="text-lg text-justify text-gray-200 bg-black p-6 rounded-lg shadow-lg w-full">
                <h3 class="text-2xl font-semibold text-red-500 mb-4">Archivo Fotográfico y Fílmico del Chocó</h3>
                <p>
                    El archivo está integrado por documentos fotográficos, tanto antiguos como recientes, que brindan
                    información y testimonio exacto de acontecimientos políticos y sociales, modas, medios y vías de
                    comunicación y de transporte, maquinarias, vivienda, urbanismo, etc., y que permiten establecer
                    comparaciones cronológicas a fin de visualizar y comprender el desarrollo evolutivo de múltiples
                    aspectos tocantes al progreso de las comunidades. Lamentablemente los gobiernos han ignorado su
                    valor
                    intrínseco y, habiéndose originado como colecciones privadas de los fotógrafos, pertenecen a éstos o
                    a sus descendientes, sin que existan mínimas leyes o normas para su preservación.
                </p>
                <p class="mt-4">
                    El Archivo Fotográfico y Fílmico del Chocó está constituido por cerca de cien mil fotografías en
                    medio
                    digital, de las cuales 3000 fueron seleccionadas para un CD Multimedia, de acuerdo a criterios
                    históricos, estéticos y documentales, tomando como punto de partida una fotografía del pueblo de
                    Istmina en 1899, a partir de la cual comienza el rollo de plasmar la historia a través de la
                    fotografía,
                    lo que involucra el trabajo de los fotógrafos o notarios de la imagen, cuyas historias de vida
                    olvidadas
                    y desconocidas recobran vigencia y reconocimiento, por su labor. Estos viejecitos artesanos
                    depositaron
                    sus anhelos congelando instantes y los cristalizaron en oficios nobles y complacientes en el
                    registro
                    indeleble del tiempo. Qué grato es sentir la necesidad de poder enhebrar en este preciso instante,
                    el
                    testimonio de estos actores veteranos que le hicieron un retrato al Chocó.
                </p>
                <p class="mt-4">
                    El Archivo fotográfico y fílmico Afrocolombiano – Chocó tiene seis componentes: Generalidades del
                    Chocó,
                    Memoria Fotográfica, Chocó en Imágenes, Patrimonio Fílmico del Chocó. La memoria fotográfica se
                    subdivide en las siguientes categorías: artesanías, sociedad, cultura, biodiversidad, turismo,
                    arquitectura, afro-chocoanos, economía, minería, iglesias, personajes, gente, etc. Aparte de lo
                    anterior, se incluyen las fichas correspondientes para cada una de las fotografías y los documentos
                    sobre la historia de la fotografía en el Chocó, los fotógrafos y un estudio general sobre la
                    fotografía
                    desde la época de Intendencia hasta la actualidad.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
