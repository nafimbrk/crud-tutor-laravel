<x-layout title="Product Edit">

    <div class="mt-16">

    <h1 class="font-bold text-2xl">Edit Data</h1>
    </div>
    <form class="mx-auto" action="{{ route('product.update', $product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4 mt-4">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
          @error('name')
        <p class="text-red-500 italic">{{ $message }}</p>
    @enderror
          <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('name') is-invalid @enderror />
        </div>
        <div class="mb-4">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
          @error('price')
        <p class="text-red-500 italic">{{ $message }}</p>
    @enderror
          <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('name') is-invalid @enderror />
        </div>
        <div class="mb-4">
          <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
          @error('stock')
        <p class="text-red-500 italic">{{ $message }}</p>
    @enderror
          <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('name') is-invalid @enderror />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
    </x-layout>
