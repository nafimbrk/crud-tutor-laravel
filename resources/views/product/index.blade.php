<x-layout title="Product">



    <div class="mt-16">
        <h1 class="font-bold text-xl">Product List</h1>
    </div>

    <div class="mt-6 mb-4 flex justify-between items-center mx-auto">



        <a href="{{ route('product.create') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
        class="fa-solid fa-plus"></i> Add
        Data</a>


        <form class="ml-auto max-w-lg" action="" method="GET">
            <div class="flex">
                <div class="relative w-full">
                    <input type="text" name="keyword" id="search-dropdown" value="{{ request('keyword') }}"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50
                        border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                        dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:border-blue-500" placeholder="Search..." />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white
                        bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4
                        focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

    </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $data->name }}</td>
                            <td class="px-6 py-4">{{ number_format($data->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $data->stock }}</td>
                            <td class="px-6 py-4">
                                @if ($data->image)
                                    <img src="{{ asset('storage/image/' . $data->image) }}" alt="" class="w-[100px] rounded">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a class="font-medium text-white bg-yellow-400 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                        href="{{ route('product.edit', $data->id) }}"><i class="fa-solid fa-pen"></i></a>
                                        <form id="delete-form-{{ $data->id }}" action="{{ route('product.destroy', $data->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="font-medium text-white bg-red-500 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                            onclick="confirmDelete({{ $data->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="my-4">
            {{ $product->withQueryString()->links() }}
        </div>

    </x-layout>











