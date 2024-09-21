<x-app-layout>

    @include('components/slider-home')
    <div class="max-w-7xl mx-auto flex flex-col gap-6 my-8 p-4 bg-white rounded-lg shadow-lg">

        <div class="max-w-7xl mx-auto my-8 p-4 bg-white rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Columna Principal: Descripción y características (ocupa dos tercios del ancho) -->
            <div class="md:col-span-2 bg-white text-black p-6 rounded-lg shadow-md">
                <h2 class="text-4xl font-bold mb-4 text-center text-red-600">Bienvenidos</h2>
                <p class="text-lg text-justify leading-relaxed mb-4 line-clamp-5" id="description">
                    <strong>Descripción:</strong> Al archivo Fotografico Y Filmico Del Chocó, es una plataforma en
                    línea
                    dedicada a la preservación, difusión y promoción del rico patrimonio cultural y educativo de la
                    región
                    del Chocó, Colombia. Esta videoteca se ha creado con el propósito de proporcionar acceso a un amplio
                    repertorio de contenidos audiovisuales que abarcan temas culturales, históricos, educativos y
                    sociales
                    relacionados con esta región.
                </p>
                <ul class="list-disc list-inside text-lg my-4 text-left">
                    <li><strong>Documentales:</strong> Obras que exploran la historia, las tradiciones y la vida
                        cotidiana
                        del Chocó, proporcionando una visión profunda de la región.</li>
                    <li><strong>Cultura y Tradiciones:</strong> Videos que destacan las festividades locales, la música
                        tradicional, la danza y las artesanías características del Chocó.</li>
                    <li><strong>Educación y Formación:</strong> Contenidos didácticos sobre temas relevantes para la
                        educación local, incluyendo tutoriales, conferencias y clases que apoyan el aprendizaje en áreas
                        específicas.</li>
                </ul>
                <img class="max-w-[300px] my-4 rounded-md shadow-lg" src="{{ asset('/images/logo.png') }}"
                    alt="Logo Videoteca">

                <div id="contenido-completo" class="hidden">
                    <ul>
                        <p><strong>Promoviendo la Conservación del Patrimonio Fílmico del Chocó</strong></p>
                        <p>En El <strong>Archivo Fotografico Y Fiilmico Del Chocó</strong>, nuestra principal intención
                            es la de preservar y difundir el patrimonio fílmico de nuestra región, un archivo visual que
                            captura la riqueza cultural, histórica y social del Chocó. Creemos firmemente que el archivo
                            fílmico es un bien común, un reflejo vivo de nuestra identidad colectiva y de la diversidad
                            que nos caracteriza como comunidad.</p>
                        <p>Es importante destacar que no poseemos los derechos de autor de todos los videos que
                            compartimos en nuestra plataforma. Algunos de ellos provienen de creadores individuales,
                            organizaciones y otras fuentes que han contribuido al enriquecimiento de este patrimonio
                            visual. Sin embargo, nuestro objetivo no es lucrar con este contenido, sino más bien
                            garantizar que el conocimiento, la cultura y la memoria del Chocó permanezcan accesibles
                            para todos.</p>
                        <p>El archivo fílmico somos todos, y somos cultura. A través de estos videos, buscamos conectar
                            a las nuevas generaciones con su historia, manteniendo vivo el legado de quienes nos
                            precedieron y celebrando la diversidad que nos define como pueblo. Nos comprometemos a
                            respetar los derechos de autor donde sea necesario, y agradecemos a todas las personas y
                            entidades que han hecho posible la recopilación de este material invaluable.</p>
                    </ul>
                </div>

                <button id="toggle-contenido" class="text-red-500 font-bold">Leer más</button>
            </div>

            <!-- Columna Derecha: Enlaces con imágenes (ocupa un tercio del ancho) -->
            <div class="bg-black text-white p-6 rounded-lg shadow-md">
                <!-- Título dinámico -->
                <div class="text-center mt-8">
                    <h1 class="text-lg text-red-600 font-semibold mt-2 text-center"><b>Galerías Y Archivos Fílmicos Del
                            Chocó</b></h1>
                </div>
                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://utch.edu.co/nueva/archivo-fotografico" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/radio.png') }}" alt="Recurso 1">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">Radio UTCH</p>
                    </a>
                </div>

                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.flickr.com/photos/artechocoano/" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/arte.png') }}" alt="Recurso 2">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">EL ARTE EN LA MEMORIA VISUAL DEL
                            CHOCO</p>
                    </a>
                </div>

                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.youtube.com/@archivofilmicodelchoco8759" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/youtube.png') }}" alt="Recurso 3">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">ARCHIVO FILMICO DEL CHOCÓ</p>
                    </a>
                </div>

                <!-- Recurso 4 -->
                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.flickr.com/photos/centroafro/albums/" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/atrato.jpg') }}" alt="Recurso 4">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">ARCHIVO FOTOGRÁFICO Y FÍLMICO DEL
                            CHOCÓ</p>
                    </a>
                </div>

                <!-- Recurso 5 -->
                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.flickr.com/photos/197769500@N02/albums/" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/avion.jpg') }}" alt="Recurso 5">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">ARCHIVO HISTÓRICO DEL PATRIMONIO
                            Cultural del Chocó</p>
                    </a>
                </div>

                <!-- Recurso 6 -->
                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.flickr.com/photos/195645830@N05/albums/with/72177720312991978" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/promocion.jpg') }}" alt="Recurso 6">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">UNIVERSIDAD TECNOLÓGICA DEL CHOCÓ
                        </p>
                    </a>
                </div>
                <!-- Recurso 7 -->
                <div class="bg-transparent p-2 rounded-lg shadow-none transform transition-transform hover:scale-105">
                    <a href="https://www.flickr.com/photos/194635754@N08/albums/" target="_blank">
                        <img class="w-full h-28 object-cover rounded-none shadow-none"
                            src="{{ asset('/images/gonza.jpg') }}" alt="Recurso 7">
                        <p class="text-lg text-red-600 font-semibold mt-2 text-center">LAS FOTOS DE GONZO-CHOCÓ-COLOMBIA
                        </p>
                    </a>
                </div>
            </div>

        </div>

</x-app-layout>

<script>
    document.getElementById('toggle-contenido').addEventListener('click', function() {
        var contenido = document.getElementById('contenido-completo');
        var button = document.getElementById('toggle-contenido');
        if (contenido.classList.contains('hidden')) {
            contenido.classList.remove('hidden');
            button.textContent = 'Leer menos';
        } else {
            contenido.classList.add('hidden');
            button.textContent = 'Leer más';
        }
    });
</script>
