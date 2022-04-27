@extends('layouts.app')

@section('css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection

@section('main')
    <div class="w-11/12 mx-auto mt-5 pb-10 ">
        <div class="grid grid-cols-1 md:grid-cols-2 shadow-md ">
           
            <div class="bg-blue-200 p-11">
                <img src="{{asset('images/register.png')}}">
            </div>

            <!-- Register -->
                <div class=" bg-white">
                    <p  class="text-gray-400 text-xs mt-5 px-10 font-bold uppercase">
                        <a href="{{route('login')}}" class="hover:text-gray-600">Already have an account ? Login Now</a>
                    </p>
                    <h2 class="text-gray-500 text-2xl pt-5 px-10 font-bold uppercase">Register</h2>

                    <!-- Register Form Open -->
                        <div class="px-10 mt-5">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <!-- Name Box Open-->
                                    <div>
                                        <label for="name" class="block text-gray-600 text-sm uppercase">Name <span class="text-red-500">*</span> </label>
                                        <input type="text" name="name" id="name" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 @if ($errors->has('name'))
                                            border-red-500
                                        @endif" value="{{old('name')}}">
                                    </div>
                                <!-- Name Box Close -->

                                <!-- Email Box Open-->
                                    <div class="mt-2">
                                        <label for="email" class="block text-gray-600 text-sm uppercase">Email Address <span class="text-red-500">*</span> </label>
                                        <input type="email" name="email" id="email" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 @if ($errors->has('email'))
                                        border-red-500
                                    @endif" value="{{old('email')}}">
                                    </div>
                                <!-- Email Box Close -->

                                <!-- Mobile Box Open-->
                                    <div class="mt-2">
                                        <label for="phone" class="block text-gray-600 text-sm uppercase">Mobile Number <span class="text-red-500">*</span> </label>
                                        <div class="flex">
                                            <input type="text" value="+977" readonly class="border-gray-300 w-16 rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 mr-2 @if ($errors->has('phone'))
                                            border-red-500
                                        @endif">
                                            <input type="number" name="phone" id="phone" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 @if ($errors->has('phone'))
                                            border-red-500
                                        @endif" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                <!-- Mobile Box Close -->

                                <!-- Password Box Open-->
                                    <div class="mt-2">
                                        <label for="password" class="block text-gray-600 text-sm uppercase">Password<span class="text-red-500">*</span> </label>
                                        <input type="password" name="password" id="password" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 @if ($errors->has('password'))
                                        border-red-500
                                    @endif">
                                    </div>
                                <!-- Password Box Close -->

                                <!-- Confirm Password Box Open-->
                                    <div class="mt-2">
                                        <label for="password_confirmation" class="block text-gray-600 text-sm uppercase">Confirm Password<span class="text-red-500">*</span> </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500">
                                    </div>
                                <!-- Confirm Password Box Close -->

                                <!-- address Box Open-->
                                    <div class="my-2">
                                        <label for="address" class="block text-gray-600 text-sm uppercase">Address <span class="text-red-500">*</span></label>
                                        <input type="text" name="address" id="address" class="border-gray-300 w-full rounded-md mt-2 focus:border-indigo-300 focus:ring-indigo-300 text-gray-500 @if ($errors->has('address'))
                                        border-red-500
                                    @endif" value="{{old('address')}}">
                                    </div>
                                <!-- Address Box Close -->

                                
                                

                                <p class="mt-2 text-sm text-gray-500">
                                    By Clicking Register, You Agree To Our Terms & Conditions
                                </p>

                               

                                <input type="submit" value="Register" class="w-full rounded-md bg-indigo-300 text-black hover:bg-indigo-500 py-1 my-5 cursor-pointer text-white">
                                
                            </form>


                        </div>
                    <!-- Register Form Close -->
                    
                </div>
            <!-- Register Close -->
        </div>
    </div>
@endsection
