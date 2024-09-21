@props(['post'])
<div class="mb-8">
    <article
        class="shadow-lg bg-black rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
        <a href="{{ route('posts.show', $post) }}" class="block relative">
            <img src="@if ($post->image) {{ Storage::url($post->image->url) }} @endif"
                alt="{{ $post->name }}"
                class="h-60 w-full object-cover opacity-80 hover:opacity-100 transition-opacity duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black opacity-70"></div>
        </a>

        <div class="p-6">
            <h1 class="text-white text-2xl font-bold mb-2">
                <a href="{{ route('posts.show', $post) }}" class="hover:text-red-500 transition-colors duration-300">
                    {{ $post->name }}
                </a>
            </h1>

            <div class="text-gray-300 text-base mb-4 post-detail">
                {!! html_entity_decode($post->extract) !!}
            </div>

            <div class="flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.tag', $tag) }}"
                        class="text-xs font-semibold px-3 py-1 rounded-full bg-{{ $tag->color }}-500 hover:bg-{{ $tag->color }}-600 transition-colors duration-300">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </article>
</div>
