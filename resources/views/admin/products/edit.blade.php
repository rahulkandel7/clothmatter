@extends('layouts.admin.app')

@section('main')
@include('layouts.message')
    <div class="py-10 px-8 w-full">
        <div class="flex justify-between py-2">
            <h1 class="text-4xl text-gray-800 font-semibold">
                Edit:- {{$product->name}}  
            </h1>
            <a href="{{route('admin.products.index')}}" class="bg-indigo-500 px-8 py-2 rounded-md shadow-md hover:shadow-lg hover:bg-[#225da5] text-white">
                Go Back
            </a>
        </div>
          <hr class="border-amber-500">
          <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data" class="py-5">
            @csrf
            @method('put')
                <div class="my-2">
                    <label class="text-gray-500">Enter Product Name</label>
                    <input type="text" name="name" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter Product Name" value="{{$product->name}}">
                    @error('name')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Select Category</label>

                    <select  name="category_id" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500">
                        <option disabled selected>-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter SKU Number</label>
                    <input type="text" name="sku" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter SKU number" value="{{$product->sku}}">
                    @error('sku')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter Brand Name</label>
                    <input type="text" name="brand" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter brand name" value="{{$product->brand}}">
                    @error('brand')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter Price</label>
                    <input type="text" name="price" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter price" value="{{$product->price}}">
                    @error('price')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <select  name="isAvailable" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500">
                        <option disabled selected>-- Is Available --</option>
                            <option value="1" @if($product->isAvailable == 1) selected @endif>Yes</option>
                            <option value="0" @if($product->isAvailable == 0) selected @endif>No</option>
                    </select>
                    @error('isAvailable')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <select  name="isDiscounted" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500">
                        <option disabled selected>-- Is Discounted --</option>
                            <option value="1" @if($product->isDiscounted == 1) selected @endif>Yes
                            </option>
                            <option value="0" @if($product->isDiscounted == 0) selected @endif>No</option>
                    </select>
                    @error('isDiscounted')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5 " id="discounted">
                    <label class="text-gray-500">Enter Discounted Price</label>
                    <input type="text" name="discountedPrice" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter Discounted Price" value="{{$product->discountedPrice}}">
                    @error('discountedPrice')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter Stock Quantity</label>
                    <input type="text" name="stock" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter Stock Amount" value="{{$product->stock}}">
                    @error('stock')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter Description</label>
                    <textarea name="description" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Enter Product Description">{{$product->description}}</textarea>
                    @error('description')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="text-gray-500">Select First Photo </label>
                    <input type="file" name="photopath1" id="" class="mt-1 w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500 file:bg-amber-500 file:border-none file:text-white file:shadow-md file:rounded-md file:hover:bg-[#ff9a01] file:cursor-pointer ">
                    @error('photopath')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="text-gray-500">Select Second Photo </label>
                    <input type="file" name="photopath2" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500 file:bg-amber-500 file:border-none file:text-white file:shadow-md file:rounded-md file:hover:bg-[#ff9a01] file:cursor-pointer ">
                    @error('photopath')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="text-gray-500">Select Third Photo </label>
                    <input type="file" name="photopath3" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500 file:bg-amber-500 file:border-none file:text-white file:shadow-md file:rounded-md file:hover:bg-[#ff9a01] file:cursor-pointer ">
                    @error('photopath')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter available color </label>
                    <input type="text" name="color" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="Red,Green,Blue" value="{{$product->color}}">
                    @error('color')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="my-2 mt-5">
                    <label class="text-gray-500">Enter available sizes</label>
                    <input type="text" name="size" id="" class="w-full border-none shadow-lg rounded-md placeholder:text-gray-700 focus:ring-amber-500" placeholder="S,M,L" value="{{$product->size}}">
                    @error('size')
                        <p class="text-red-500 p-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>


            <div class="flex my-6">
                <a href="{{route('admin.categories.index')}}" class="bg-red-400  px-8 py-1 rounded-md shadow-md hover:shadow-lg hover:bg-red-500 text-white">
                    Cancel
                </a>

                <input type="submit" value="Save" class="bg-indigo-500 px-8 py-1 ml-4 rounded-md shadow-md hover:shadow-lg hover:bg-[#225da5] text-white">
            </div>

          </form>

          
    </div>
@endsection

@section('js')
    <script>
        function showD(){
            console.log("hello");
            document.getElementById("discounted").classList.remove("hidden");
        }
    </script>
@endsection