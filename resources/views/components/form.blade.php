<form method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="subject">Asunto:</label>
        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
        @error('subject')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        @error('message')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Enviar</button>
</form>