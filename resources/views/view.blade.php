@extends('layouts.app')

@section('css')
    <style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  
    .custom-number-input input:focus {
      outline: none !important;
    }
  
    .custom-number-input button:focus {
      outline: none !important;
    }

    .show{
      border:2px solid red;
    }
  </style>
  <link rel="stylesheet" href="{{asset('css/owl/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/owl/owlnav.css')}}">

@endsection

@section('main')
  <div class="w-10/12 md:mx-auto mx-auto mt-10 pb-10">
    <div class="grid md:grid-cols-2">
      <div x-data="{ total: 3, current: 0, open: true }" class="md:border-r-2">
        <div x-show="open" class="">
          <div class="px-4 ">
            <img x-show="current == 0" src="/storage/{{$product->photopath1}}" class=" w-full zoom1 max-h-[33rem]">
            <img x-show="current == 1" src="/storage/{{$product->photopath2}}" class=" w-full zoom2 max-h-[33rem]">
            <img x-show="current == 2" src="/storage/{{$product->photopath3}}" class=" w-full zoom3 max-h-[33rem]">
          </div>
        </div>
        <div class="flex mt-10 md:mt-0">
          <img width="100" @click="current = 0, open = true" src="/storage/{{$product->photopath1}}" class="m-3 rounded-lg shadow-lg" :class="{'border-2 border-yellow-300': current == 0, 'border-white': current != 0}">
          <img width="100" @click="current = 1, open = true" src="/storage/{{$product->photopath2}}" class="m-3 rounded-lg shadow-lg" :class="{'border-2 border-yellow-300': current == 1, 'border-white': current != 1}">
          <img width="100" @click="current = 2, open = true" src="/storage/{{$product->photopath3}}" class="m-3 rounded-lg shadow-lg" :class="{'border-2 border-yellow-300': current == 2, 'border-white': current != 2}">
        </div>
      </div>
    
      <div class="md:ml-5 mt-5 md:mt-0" >
        <h1 class="text-4xl text-semibold mb-3">{{$product->name}}</h1>
        @if($product->isDiscounted == 1) <h2 class=" text-2xl line-through font-semibold text-gray-500 inline-block">Rs.{{$product->price}} /-</h2>
        <h2 class=" text-3xl font-semibold text-red-700 inline-block ml-3">Rs.{{$product->discountedPrice}}/-</h2> @else <h2 class=" text-3xl font-semibold text-red-700 inline-block ml-3">Rs.{{$product->price}} /-</h2> @endif
        <hr>
        
        <table>
          <tr>
            <td>
              <p class="text-black text-lg font-semibold mt-2">
                Brand
              </p>
            </td>
            <td>
              <p class="text-black text-lg ml-3 mt-2">
                {{$product->brand}} 
              </p>
            </td>
          </tr>
          <tr>

            <tr>
              <td>
                <p class="text-black text-lg font-semibold mt-2">
                  Category
                </p>
              </td>
              <td>
                <p class="text-black text-lg ml-3 mt-2">
                  {{$product->category->title}}
                </p>
              </td>
            </tr>
            <tr>
            
            <td>
              <p class="text-black text-lg font-semibold mt-2">
                Color
              </p>
            </td>
            <td>
              <select name="color" id="" class="border-0 shadow-md ml-3 mt-2">
                <option selected disabled>Select Color</option>
                @foreach ($colors as $color)
                  <option value="{{$color}}">{{$color}}</option> 
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <p class="text-black text-lg font-semibold mt-2">
                Size
              </p>
            </td>
            <td>
              <select name="color" id="" class="border-0 shadow-md ml-3 mt-4">
                <option selected disabled>Select Size</option>
                @foreach ($sizes as $size)
                  <option value="{{$size}}">{{$size}}</option> 
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <p class="text-black text-lg font-semibold mt-2">
                Quantity
              </p>
            </td>
            <td>
              
              <div class="flex flex-row h-10 w-7/12 rounded-lg relative bg-transparent mt-4 shadow-md ml-3">
                  <button data-action="decrement" class=" bg-white hover:bg-gray-100 text-gray-600 hover:text-gray-700 
                   h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </button>
                  <input type="number" class=" focus:outline-none focus:ring-yellow-300 focus:border-yellow-300 text-center w-full bg-white font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none border-gray-100" name="custom-input-number" value="0">
                <button data-action="increment" class="bg-white hover:bg-gray-100 text-gray-600 hover:text-gray-700 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
            </td>
            
          </tr>
          @if($product->stock < 1)
            <tr>
              <td>
                <p class="text-red-500  text-lg mt-2">
                  <sup >*</sup>Out of Stock
                </p>
              </td>
              
            </tr>
          @endif
          
        </table>
        <div class="mt-4 flex justify-around">
            <button type="submit"  class="rounded-md shadow-md bg-blue-500 text-white px-10 py-2 mt-3 cursor-pointer hover:bg-blue-700"><i class="fa-brands fa-opencart mr-2"></i> Add To Cart </button>
        
            <button type="submit"  class="rounded-md shadow-md bg-red-500 text-white px-10 py-2 mt-3 cursor-pointer hover:bg-red-600"><i class="fa-solid fa-heart mr-2"></i> Add To Wishlist</button>
        </div>

      </div>

    </div>
    

  

    <div class="mt-7">
      <div>
        
        <div>
          <p class="text-black text-lg mt-2">
            About this item
          </p>
          <p class="text-gray-600">
             {{$product->description}}
          </p>
        </div>
        

      </div>
      
    </div>
  </div>

<!-- Related Product Section Open -->
  <div class="md:mx-24 mx-5 mt-10">
    <h2 class="text-xl md:text-3xl text-gray-500 hover:text-gray-800 pointer font-bold float-left">
      Related Product
    </h2>
    <button class="rounded shadow-md bg-gray-700 font-bold hover:bg-gray-500 text-white px-3 py-1 float-right">Show More</button>
  </div>

  <div class="mt-24 md:mx-24 mx-5">
    <div class="owl-carousel owl-top" id="owl-products">
      <div class="item">
          <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/1.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      <div class="item">
          <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/2.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      <div class="item">
        <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/3.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      <div class="item">
        <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/4.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      <div class="item">
        <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/5.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      <div class="item">
        <a href="/view">
            <div class="bg-white shadow-md hover:shadow-lg mx-2 relative toppicks overflow-hidden mb-3 group">
                <div class="w-8/12 mx-auto h-10/12 flex justify-center">
                    <img src="{{asset('images/products/1.jpeg')}}" alt="" class="mt-5 w-auto h-40 group-hover:scale-110 transition-all ease-in-out delay-150 duration-200">
                </div>
                <p class="rounded bg-indigo-300 inline-block p-1 text-sm font-bold text-gray-50 absolute right-4 top-4">30% off</p>
                <p class="mt-5 text-center text-gray-600 hover:text-black cursor-pointer px-1 h-6">Womens Dress</p>
                <p class="text-center mt-3 text-black text-lg font-semibold pb-3 pt-3 h-14">
                <span class="text-sm line-through text-gray-700 mr-1">Rs 17,499</span> Rs 14,599
                </p>
            </div>
          </a>
      </div>
      
    </div>
    
  </div>
<!-- Related Product Section Close -->

  </div>
@endsection

@section('js')
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>


  <script src="{{asset('js/owl/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/blowup.min.js')}}"></script>

  <script>
      $(document).ready(function () { $(".zoom1").blowup({'scale':3}); })
      $(document).ready(function () { $(".zoom2").blowup({'scale':3}); })
      $(document).ready(function () { $(".zoom3").blowup({'scale':3}); })
  </script>

  <script>
    $(document).ready(function(){
        $(".owl-slide").owlCarousel({
          nav:true,
          items: 1,
          touchDrag:true,
          mouseDrag:false,
          autoplay:true,
          autoplaySpeed: 1000,
          loop:true,
          dotsEach:true,
          navSpeed:1000,
        });
    });

    $(document).ready(function(){
        $(".owl-top").owlCarousel({
          nav:true,
          items: 5,
          touchDrag:true,
          mouseDrag:true,
          loop:true,
          margin:10,
          responsive:{
              0:{
                    items:2
              },
              600:{
                    items:3
              },
              1000:{
                    items:5
              }
          }
        });
    });
  </script>
    <script>
      function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if(value>0){
          value--;
          target.value = value;
        }
        
      }
    
      function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
      }
    
      const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
      );
    
      const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
      );
    
      decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
      });
    
      incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
      });
  </script>

  

@endsection
