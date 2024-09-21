<div class="flex flex-col gap-5">
    @foreach ($list as $item )
    <div class="">
        @include('comments.item',['item'=> $item,'post'=> $post])

    </div>
    @endforeach
</div>