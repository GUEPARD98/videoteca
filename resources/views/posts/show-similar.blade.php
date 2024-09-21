<x-app-layout>

    <div class="container my-0 mx-auto md:px-8 py-5 gap-5 max-w-7xl">
        <nav class="flex my-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                        Articulos
                    </span>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 ">
                            {{$post->name}}</span>
                    </div>
                </li>

            </ol>
        </nav>
        <div class=" max-w-7xl">

            <h1 class="text-4xl font-semibold text-opacity-20"> {{$post->id}} {{$post->name}}dd</h1>

            <div class="my-2 flex gap-2">
                <p>Por admin :</p>
                <span> {{$post->updated_at->format('d-m-Y ')}}
                </span>
            </div>

            <div class="text-lg text-gray-500 post-detail">
                {!! html_entity_decode($post->extract) !!}

            </div>
        </div>
        <div class="grid grid-cols-3 gap-6 my-8 ">

            {{-- contenido pricipal --}}
            <div class="col-span-3 md:col-span-2 ">
                <img class="w-full h-[400px] bg-cover bg-center object-cover"
                    src="@if($post->image){{Storage::url($post->image->url)}} @endif">
                <div class="text-base text-gray-700  post-detail">
                    {!! html_entity_decode($post->body) !!}

                </div>

            </div>

            <div class="col-span-3  md:md:col-span-1">
                <h3>Articulos relacionados </h3>

                <div class="flex gap-5 flex-col">

                    @foreach ($similares as $similar)

                    <a href="{{route('posts.show',$similar)}}" class="
                    flex gap-2">
                        <article class="w-[150px] h-[80px] bg-cover bg-center " class="w-full h-80 bg-cover bg-center"
                            style="background-image: url(@if($similar->image) {{Storage::url($similar->image->url)}} @else 'https://media.istockphoto.com/id/1357365823/vector/default-image-icon-vector-missing-picture-page-for-website-design-or-mobile-app-no-photo.jpg?s=612x612&w=0&k=20&c=PM_optEhHBTZkuJQLlCjLz-v3zzxp-1mpNQZsdjrbns='
                            @endif)">
                        </article>

                        <div class="w-[80%] h-full  flex flex-col justify-center">
                            <h1 class="text-lg font-bold ">
                                {{$similar->name}}
                            </h1>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>


            {{-- {{dd($post->comments())}}
            --}} {{-- contenido relacionado --}}
            <div class="flex flex-col w-full col-span-2 my-0 mx-auto">
                @include('comments.show',['list'=> $post->comments,'post'=> $post])


                @include('comments.form')
            </div>
        </div>
    </div>
</x-app-layout>