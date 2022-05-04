<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- FontAwesome CDN -->
        <script src="https://kit.fontawesome.com/535ccb550f.js" crossorigin="anonymous"></script>

        {{-- Animate Css --}}
        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            {{-- Info Open --}}
                <div class="w-11/12 mx-auto">
                    <div class="flex bg-stone-50 px-5 justify-between py-1 items-center text-sm font-semibold">
                        <p class="text-gray-600 ">
                            CALL US: <a href="tel:+9779824278722">+9779824278722</a>
                        </p>
                        <div>
                            @auth
                                <form action="{{route('logout')}}" method="post" class="inline-block">
                                    @csrf
                                    <button type="submit" class="text-gray-600 ">
                                        Welcome!, {{Auth::user()->name}} 

                                    </button>

                                </form>
                                <span class="px-2 text-gray-300">|</span>

                                <a href="{{route('dashboard')}}" class="text-gray-600 ">
                                    Dashbaord
                                </a>

                            @endauth
                            @guest
                                <a href="{{route('login')}}" class="text-gray-600 ">
                                    Login / Register
                                </a>
                            @endguest
                            <span class="px-2 text-gray-300">|</span>
                            <a href="#" class="text-gray-600 ">
                                My Account
                            </a>
                            <span class="px-2 text-gray-300">|</span>
                            <a href="#" class="text-gray-600 ">
                            Contact Us
                            </a>
                        </div>
                    </div>
                    
                </div>
            {{-- Info Close --}}
            {{-- Navbar Open --}}
                <div class="w-full bg-gray-50 border-t">
                    <div class="w-11/12 mx-auto">
                        <div class="flex justify-between py-2 items-center">
                            <div>
                                <img src="{{asset('images/logo.png')}}">
                            </div>
                            <div>
                                <a href="#" class="px-4  text-indigo-800 font-bold">Home</a>
                                <a href="#" class="px-4 text-gray-600 hover:text-indigo-800 hover:font-bold">Womens</a>
                                <a href="#" class="px-4 text-gray-600 hover:text-indigo-800 hover:font-bold">Mens</a>
                                <a href="#" class="px-4 text-gray-600 hover:text-indigo-800 hover:font-bold">Contact</a>
                            </div>
                            <div>
                                <a href="#" class="px-4 text-gray-600 hover:text-indigo-900 hover:font-bold ">
                                    <i class="fa-solid fa-magnifying-glass"></i> S
                                </a>
                               @auth
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-900 hover:font-bold">
                                        <i class="fa-solid fa-heart"></i> W
                                    </a>
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-800 hover:font-bold">
                                        <i class="fa-solid fa-user"></i> P
                                    </a>
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-800 hover:font-bold">
                                        <i class="fa-solid fa-cart-shopping"></i> C
                                    </a>
                               @endauth
                            </div>
                        </div>
                    </div>
                </div>
            {{-- Navbar Close --}}

            @yield('main')

            {{-- Footer Open --}}
                <div class="bg-sky-50 w-full">
                    <div class="w-11/12 mx-auto">
                        <div class="grid grid-cols-4 py-16 gap-10">
                            <div>
                                <h1 class="text-xl font-bold">About Us</h1>
                                <p class="py-5 text-gray-500">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse maiores eos error nulla nemo, commodi nam perferendis cumque quibusdam, quos, 
                                </p>
                            </div>

                            <div>
                                <h1 class="text-xl font-bold">Newsletter</h1>
                                <p class="py-5 text-gray-500">
                                    Stay updated with our latest trends
                                </p>
                                <form class="flex">
                                    <input type="text" name="subscribe" id="" class="active:ring-transparent active:border-none focus:border-none border rounded-lg border-gray-200 rounded-r-none" placeholder="Email Address">
                                    <button type="submit" class="bg-indigo-400 rounded-l-none hover:bg-indigo-600 rounded-lg px-4 text-white font-bold text-xl">&rightarrow;</button>
                                </form>
                            </div>

                            <div>
                                <h1 class="text-xl font-bold">Follow Us</h1>
                                <p class="py-5 text-gray-500">
                                    Let us be on Social
                                </p>
                                <div class="flex">
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-900 hover:font-bold ">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-900 hover:font-bold ">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="#" class="px-4 text-gray-600 hover:text-indigo-900 hover:font-bold ">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center py-5">
                            <p class="text-sm text-gray-600">
                                Copyright ©2022 All rights reserved | Made with &hearts; 
                            </p>
                        </div>
                    </div>
                </div>
            {{-- Footer Close --}}
        </div>

        @yield('js')
    </body>
</html>
