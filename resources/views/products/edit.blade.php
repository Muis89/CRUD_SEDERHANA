@extends('layouts.app')

@section('content')
<div x-data="{ showForm: false }" 
     x-init="setTimeout(() => showForm = true, 100)" 
     class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
    
    <div x-show="showForm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="relative py-3 sm:max-w-xl sm:mx-auto">

        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow-xl rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="flex items-center space-x-5">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold text-gray-900">Edit Product</h2>
                        <p class="text-gray-500 text-sm mt-1">Update your product information below</p>
                    </div>
                    <div>
                        <a href="{{ route('products.index') }}" 
                           class="flex items-center text-blue-600 hover:text-blue-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>

                <div x-data="{ showMessage: true }" 
                     x-init="setTimeout(() => showMessage = false, 3000)"
                     class="mt-4">
                    @session('success')
                        <div x-show="showMessage"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-90"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-90"
                             class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r"
                             role="alert">
                            <p class="font-medium">{{ $value }}</p>
                        </div>
                    @endsession
                </div>

                <form action="{{ route('products.update', $product->id) }}" 
                      method="post" 
                      class="divide-y divide-gray-200"
                      x-data="{ 
                          code: '{{ $product->code }}',
                          name: '{{ $product->name }}',
                          quantity: '{{ $product->quantity }}',
                          price: '{{ $product->price }}'
                      }">
                    @csrf
                    @method("PUT")

                    <div class="py-8 space-y-6 text-base leading-6">
                        <div class="flex flex-col" data-aos="fade-up" data-aos-delay="100">
                            <label for="code" class="text-sm font-medium text-gray-700 mb-1">Product Code</label>
                            <input type="text" 
                                   id="code" 
                                   name="code" 
                                   x-model="code"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                   @error('code') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('code')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col" data-aos="fade-up" data-aos-delay="200">
                            <label for="name" class="text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name"
                                   x-model="name"
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Jumlah</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Harga</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Deskripsi Produk</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection