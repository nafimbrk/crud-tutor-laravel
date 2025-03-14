<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $product = Product::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('price', 'LIKE', '%' . $keyword . '%')
                ->orWhere('stock', 'LIKE', '%' . $keyword . '%');
        })
        ->paginate(3);

        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif,webp'
        ], [
            'name.required' => 'name wajib diisi',
            'price.required' => 'price wajib diisi',
            'stock.required' => 'stock wajib diisi',
            'image.mimes' => 'image harus berformat png/jpg/jpeg/gif/webp'
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());

            $input['image'] = $image->hashName();
        }

        Product::create($input);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ], [
            'name.required' => 'name wajib diisi',
            'price.required' => 'price wajib diisi',
            'stock.required' => 'stock wajib diisi',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());

            Storage::delete('public/image/' . $product->image);

            $input['image'] = $image->hashName();
        } else {
            unset($input['image']);
        }

        $product->update($input);

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('product.index');
    }
}
