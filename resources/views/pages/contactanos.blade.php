<x-app-layout>
    <div class="min-h-screen">
        <!-- Imagen de Encabezado -->
        <div class="relative h-72 flex items-center justify-center">
            <img src="{{ asset('images/portada.jpg') }}" alt="Encabezado de la página"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="relative text-center text-white z-10">
                <h1 class="font-extrabold text-red-500 text-3xl">Archivo Fotografico Y Filmico Del Chocó
                </h1>
                <h1 class="text-bold text-white text-xl">Contáctanos</h1>
                <nav class="flex justify-center my-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house  text-red-500"></i>
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium text-gray-200 hover:text-red-500">
                                Inicio
                            </a>
                        </li>
                        <li class="inline-flex items-center">
                            <a href="/contactanos"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-red-500">
                                / Contáctanos
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container py-8 mx-auto max-w-6xl">
            <h1 class="text-3xl font-medium mb-8 text-center text-red-600">Contáctanos</h1>

            <div class="flex justify-center w-full flex-col items-center my-6">
                <h2 class="text-2xl text-center">¿Tienes una pregunta?</h2>
                <p class="text-center mb-4">Simplemente comunícate a través de un email o déjanos tu mensaje, cuando
                    tengas una petición, queja o reclamo.</p>

                @if (session('mensaje'))
                    <div class="text-white rounded-sm p-3 bg-green-600"><strong>{{ session('mensaje') }}</strong></div>
                @else
                    <form method="POST" class="shadow-md rounded-md max-w-3xl p-6 bg-gray-900 w-full text-white"
                        action="{{ route('contact.submit') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-lg mb-2">Nombre:</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                value="{{ old('name') }}" required pattern="[A-Za-z\s]+"
                                title="Solo letras y espacios permitidos">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-lg mb-2">Correo electrónico:</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block text-lg mb-2">Asunto:</label>
                            <input type="text" id="subject" name="subject"
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                value="{{ old('subject') }}" required pattern="[A-Za-z\s]+"
                                title="Solo letras y espacios permitidos">
                            @error('subject')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-lg mb-2">Mensaje:</label>
                            <textarea id="message" name="message"
                                class="block p-2.5 w-full text-sm  bg-gray-800 rounded-lg border border-gray-600 focus:ring-red-500 focus:border-red-500 text-white"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Verificación anti-spam -->
                        <div class="mb-4">
                            <label for="human_check" class="block text-lg mb-2">¿Cuánto es {{ $num1 }} +
                                {{ $num2 }}?</label>
                            <input type="text" id="human_check" name="human_check"
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                required pattern="\d+" title="Solo números permitidos">
                            @error('human_check')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Enviar</button>
                    </form>
                @endif
            </div>

            <div class="contacto-mapa mt-8 flex justify-center">
                <div class="w-full max-w-4xl">
                    <h2 class="text-2xl font-medium mb-4 text-center">Ubicación</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.2206746536726!2d-76.64874322525392!3d5.681211394300394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4932ec47709e37%3A0x5698132ef36d83ae!2sUniversidad%20Tecnol%C3%B3gica%20Del%20Choc%C3%B3!5e0!3m2!1ses-419!2sco!4v1721545911889!5m2!1ses-419!2sco"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
