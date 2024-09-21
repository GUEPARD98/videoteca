<x-app-layout>

    <div class="container  md:px-8 py-5 gap-5 max-w-6xl my-0 mx-auto">
        <nav class="flex my-4 justify-between" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-house"></i>
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        fedeurema
                    </a>
                </li>
                <li class="inline-flex items-center">

                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="/educacion"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                        Educación
                    </a>
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

            <div class="flex gap-2 items-center">
                <i class="fa-regular fa-calendar text-my_green"></i>
                {{$post->created_at}}
            </div>
        </nav>
        <div class=" ">

            <h1 class="text-4xl font-semibold text-opacity-20"> {{$post->name}}</h1>


            <div class="text-lg text-gray-500 item-detail">
                {!! html_entity_decode($post->extract) !!}

            </div>
        </div>
        <div class="grid  gap-6 my-4 ">

            {{-- contenido pricipal --}}
            <div class="col-span-3 md:col-span-2 ">
                <img class="w-full h-[400px] bg-cover bg-center object-cover"
                    src="@if($post->image){{Storage::url($post->image->url)}} @endif">
                <div class="text-base text-gray-700  item-detail">
                    {!! html_entity_decode($post->body) !!}

                </div>


                <div>


                    @if ($post->archivo)

                    <embed src="{{Storage::url($post->archivo->url)}}" type="application/pdf" width="100%"
                        height="600px" />

                    @endif

                </div>

            </div>



        </div>
    </div>
</x-app-layout>
