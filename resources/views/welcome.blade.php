@extends('layouts.app')

@section('css')
     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

     <style>
         .img{
             overflow: hidden;

         }
         .img img{
            transition: .2s all ease-in-out;

         }
         .img:hover img{
             transform: scale(1.08);


         }
     </style>
@endsection

@section('main')
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($slideshows as $slideshow)
                <div class="swiper-slide ">
                    <img src="/storage/{{$slideshow->photopath}}" class="h-auto">
                </div>
            @endforeach
          
          
        </div>
    </div>

    <div class="w-11/12 mx-auto my-20">
        <div class="grid grid-cols-2 gap-10 my-5">
            <div class="relative group">
                <img src="{{asset('images/bg.jpeg')}}" >
                <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 group-hover:bg-indigo-500 group-hover:bg-opacity-50"></div>
                <div class=" absolute top-[20%] font-bold right-[30%]">
                    <p class="capitalize text-4xl text-white text-center">
                        Hot Deals of <br> this month
                    </p>
                    <a href="#" class="text-white text-xl hover:text-gray-200 hover:underline ml-[30%]">Shop More</a>

                </div>
            </div>

            <div class="relative group">
                <img src="{{asset('images/bg.jpeg')}}" >
                <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 group-hover:bg-indigo-500 group-hover:bg-opacity-50"></div>
                <div class=" absolute top-[20%] font-bold right-[30%]">
                    <p class="capitalize text-4xl text-white text-center">
                        Hot Deals of <br> this month
                    </p>
                    <a href="#" class="text-white text-xl hover:text-gray-200 hover:underline ml-[30%]">Shop More</a>

                </div>
            </div>
        </div>
    </div>

   {{-- Female Products --}}
    <div class="w-11/12 mx-auto my-10">

        <h1 class="text-center text-4xl font-bold">
            Featured Women's Products
        </h1>

        <div class="grid grid-cols-4 gap-10 my-10">
            @foreach ($womens as $women)
                {{-- Items Open --}}
                    <div class="shadow-md group hover:shadow-lg  img">
                        <div class="relative">
                            <img src="/storage/{{$women->photopath1}}" class="rounded-md h-64 w-full">
                            <div class="absolute hidden group-hover:block right-[30%] bottom-2 animate__animated animate__fadeInUp">

                                    <a href="{{route('view',$women->id)}}" class="px-6 py-1 rounded-full bg-indigo-400 text-white hover:bg-indigo-600">Quick Look</a>

                            </div>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{route('view',$women->id)}}"  class="text-xl font-bold pt-3 text-center hover:text-indigo-500">
                                {{$women->name}}
                            </a>
                        </div>
                        <p class="text-center text-gray-600 font-bold pb-2">
                            @if($women->isDiscounted == 1) <span class="line-through text-sm">Rs {{$women->price}}</span> Rs {{$women->discountedPrice}} @else Rs {{$women->price}} @endif 
                            
                        </p>
                        
                    </div>
                {{-- Items Close --}}
            @endforeach

                
        </div>

        <div class="flex justify-center">
            <button class="px-8 py-1 bg-indigo-400 hover:bg-indigo-600 rounded-md shadow-md text-white"> Show More</button>
        </div>

    </div>
   {{-- Female products Close --}}

   <div class="w-11/12 mx-auto">
        <div class="bg-amber-500 w-full h-72 rounded-md shadow-lg">
            <img src="{{asset('images/banner.png')}}" alt="Banner" class="w-full h-full rounded-md">
        </div>
   </div>


   {{-- Male Products --}}
    <div class="w-11/12 mx-auto my-10">

        <h1 class="text-center text-4xl font-bold">
            Featured Men's Products
        </h1>

        <div class="grid grid-cols-4 gap-10 my-10">
            @foreach ($mens as $men)
                {{-- Items Open --}}
                    <div class="shadow-md group hover:shadow-lg  img">
                        <div class="relative">
                            <img src="/storage/{{$men->photopath1}}" class="rounded-md h-64 w-full">
                            <div class="absolute hidden group-hover:block right-[30%] bottom-2 animate__animated animate__fadeInUp">

                                    <a href="{{route('view',$men->id)}}" class="px-6 py-1 rounded-full bg-indigo-400 text-white hover:bg-indigo-600">Quick Look</a>

                            </div>
                        </div>
                        <div class="flex justify-center">
                            <a href="{{route('view',$men->id)}}"  class="text-xl font-bold pt-3 text-center hover:text-indigo-500">
                                {{$men->name}}
                            </a>
                        </div>
                        <p class="text-center text-gray-600 font-bold pb-2">
                            @if($men->isDiscounted == 1) <span class="line-through text-sm">Rs {{$men->price}}</span> Rs {{$men->discountedPrice}} @else Rs {{$men->price}} @endif 
                            
                        </p>
                        
                    </div>
                {{-- Items Close --}}
            @endforeach

        </div>

        <div class="flex justify-center">
            <button class="px-8 py-1 bg-indigo-400 hover:bg-indigo-600 rounded-md shadow-md text-white"> Show More</button>
        </div>

    </div>
    {{-- Male products Close --}}
@endsection

@section('js')
     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 30,
          centeredSlides: true,
          autoplay: {
            delay: 2500,
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

@endsection