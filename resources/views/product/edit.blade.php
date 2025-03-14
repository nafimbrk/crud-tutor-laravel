<x-layout title="Product Edit">

    <div class="mt-16">

    <h1 class="font-bold text-2xl">Edit Data</h1>
    </div>
    <form class="mx-auto" action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
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
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
            @if ($product->image)
            <img src="{{ asset('storage/image/' . $product->image) }}" alt="" class="w-5/12 rounded img-preview">
            @else
            <img class="img-preview w-5/12 mb-3 rounded-md shadow-md" src="" alt="">
            @endif
            @error('image')
            <p class="text-red-500 italic">{{ $message }}</p>
            @enderror
            <input type="file" name="image" id="image" value="{{ old('image') }}"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror"
                onchange="previewImage()">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
    </x-layout>

    <script>
        function previewImage() {
            const imageInput = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
