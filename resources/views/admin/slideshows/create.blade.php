@extends('layouts.admin.app')

@section('main')
    <div class="py-10 px-8 w-full">
        <div class="flex justify-between py-2">
            <h1 class="text-4xl text-gray-800 font-semibold">
                Add New Slideshow
            </h1>
            <a href="{{route('admin.slideshows.index')}}" class="bg-indigo-500 px-8 py-2 rounded-md shadow-md hover:shadow-lg hover:bg-[#225da5] text-white">
                Go Back
            </a>
        </div>
          <hr class="border-amber-500">
          <form action="{{route('admin.slideshows.store')}}" method="post" enctype="multipart/form-data" class="py-5">
            @csrf
            {{-- <div class="my-2">
                <input type="text" name="title" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter Title" value="{{old('title')}}">
                @error('title')
                    <p class="text-red-500 p-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mt-5">
                <textarea name="description" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500 " placeholder="Enter Description">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500 p-2">
                        {{$message}}
                    </p>
                @enderror
            </div> --}}
            <div class="mt-5">
                <input type="file" name="photopath" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500 file:bg-amber-500 file:border-none file:text-white file:shadow-md file:rounded-md file:hover:bg-[#ff9a01] file:cursor-pointer ">
                @error('photopath')
                    <p class="text-red-500 p-2">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="flex my-6">
                <a href="{{route('admin.slideshows.index')}}" class="bg-red-400  px-8 py-1 rounded-md shadow-md hover:shadow-lg hover:bg-red-500 text-white">
                    Cancel
                </a>

                <input type="submit" value="Save" class="bg-indigo-500 px-8 py-1 ml-4 rounded-md shadow-md hover:shadow-lg hover:bg-[#225da5] text-white">
            </div>

          </form>

          
    </div>
@endsection