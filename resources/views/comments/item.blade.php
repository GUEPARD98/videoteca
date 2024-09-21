<div class="w-full bg-white p-2 rounded-md">
    <div>
        <p> <span class="font-bold"> {{$item->role}}
            </span> <span>dice:</span></p>
        <p class=" ml-2 mb-1text-sm text-gray-500"> {{$item->updated_at->toDateString()}} </p>
        <p class="ml-2">{{$item->description}}</p>
        <p>{{$item->user->role}}</p>



    </div>


    {{-- @auth()
    --}} <button id="dropdownSearchButton" data-dropdown-toggle="#respon-{{$item->id}}" data-dropdown-placement="bottom"
        class="text-my_blue font-extrabold  focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
        type="button">Responder
    </button>

    <!-- Dropdown menu -->
    <div id="#respon-{{$item->id}}" class="z-10 hidden max-w-7xl bg-white rounded-lg shadow  ml-4">


        @include('comments.form',['item'=>$item,'post'=> $post])

    </div>
    {{-- @else

    <a href="/login?redirect_to={{url()->current()}}"
        class="text-my_blue font-extrabold  focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">Responder</a>
    @endauth --}}


    @if($item->responses)
    <div class="ml-[20px]">
        @include('comments.show',['list'=>$item->responses])
    </div>

    @endif


</div>