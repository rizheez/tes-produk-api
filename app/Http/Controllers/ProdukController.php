<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $datas = Produk::all();

        return response()->json($datas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk' => 'required',
            'kategori' => 'required',
            'supplier' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        $produk = Produk::create([
            'produk' => $validated['produk'],
            'kategori' => $validated['kategori'],
            'supplier' => $validated['supplier'],
            'stok' => $validated['stok'],
            'harga' => $validated['harga'],
        ]);

        return response()->json($produk, 201);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'produk' => 'required',
            'kategori' => 'required',
            'supplier' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);


        $produk = Produk::findOrFail($id);

        $produk->produk = $validated['produk'];
        $produk->kategori = $validated['kategori'];
        $produk->supplier = $validated['supplier'];
        $produk->stok = $validated['stok'];
        $produk->harga = $validated['harga'];

        $produk->save();

        return response()->json($produk, 201);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrfail($id);
        $produk->delete();

        return response()->json('data berhasil dihapus', 204);
    }
}
