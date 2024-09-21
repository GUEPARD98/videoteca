@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .mySwiper {}

        .mySwiper .image {
            height: 55vh;

        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-repeat: no-repeat;
        }
    </style>
@endpush



<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($postsSlider as $post)
            <div class="swiper-slide  flex flex-col md:flex-row  h-[70vh] md:h-[55vh]">

                <div class="w-full  image relative">
                    <h1
                        class=" text-white text-5xl top-[10rem] left-[5rem] md:left-[10rem] text-start font-medium absolute">
                        {{ $post->name }}
                    </h1>
                    <img src="@if ($post->image) {{ asset('storage/' . $post->image->url) }}@else https://caracoltv.brightspotcdn.com/dims4/default/3749817/2147483647/strip/true/crop/1500x839+0+0/resize/1000x559!/quality/90/?url=http%3A%2F%2Fcaracol-brightspot.s3.amazonaws.com%2Fe5%2F35%2Fa26ffe6c4119b2aab033e0b13a93%2Fquibdo-festival-atrato-detonante.jpg @endif"
                        alt="{{ $post->name }}">
                </div>
            </div>
        @endforeach

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>





@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            loop: false,

            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
