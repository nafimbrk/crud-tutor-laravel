<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
            'stock' => 'required'
        ], [
            'name.required' => 'name wajib diisi',
            'price.required' => 'price wajib diisi',
            'stock.required' => 'stock wajib diisi'
        ]);

        Product::create($request->all());
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
            'stock' => 'required'
        ], [
            'name.required' => 'name wajib diisi',
            'price.required' => 'price wajib diisi',
            'stock.required' => 'stock wajib diisi'
        ]);

        $product->update($request->all());
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
