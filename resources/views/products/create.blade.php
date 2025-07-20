@extends('layouts.app')

@section('content')
<div x-data="{ showForm: false }" x-init="setTimeout(() => showForm = true, 100)" class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div x-show="showForm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="flex items-center justify-between">
                    <div class="text-2xl font-semibold text-gray-900">Tambah Produk Baru</div>
                    <a href="{{ route('products.index') }}" class="flex items-center text-blue-600 hover:text-blue-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                </div>

                <form action="{{ route('products.store') }}" method="post" class="divide-y divide-gray-200">
                    @csrf
                    <div class="py-8 space-y-6 text-base leading-6">
                        <div class="flex flex-col">
                            <label for="code" class="text-sm font-medium text-gray-700 mb-1">Kode Produk</label>
                            <input type="text" id="code" name="code" value="{{ old('code') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                   @error('code') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('code')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                   @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="quantity" class="text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                   @error('quantity') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('quantity')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="price" class="text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                   @error('price') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="description" class="text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
                            <textarea id="description" name="description" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200
                                    @error('description') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                                class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Tambah Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
