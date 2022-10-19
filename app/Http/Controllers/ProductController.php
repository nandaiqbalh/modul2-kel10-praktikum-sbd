<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->get();

        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO products(merk, harga, stock) VALUES ( :merk, :harga, :stock)',
            [
                'merk' => $request->merk,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]
        );

        // Menggunakan laravel eloquent
        // Product::create([
        //     'merk' => $request->merk,
        //     'harga' => $request->harga,
        //     'stock' => $request->stock,
        // ]);

        return redirect()->route('product.index')->with('success', 'Data Product berhasil disimpan');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('product.edit')->with('product', $product);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE products SET merk = :merk, harga = :harga, stock = :stock WHERE id = :id',
            [
                'id' => $id,
                'merk' => $request->merk,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]
        );

        // // Menggunakan laravel eloquent
        // Product::where('id', $id)->update([
        //     'merk' => $request->merk,
        //     'harga' => $request->harga,
        //     'stock' => $request->stock,
        // ]);

        return redirect()->route('product.index')->with('success', 'Data Product berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM products WHERE id = :id', ['id' => $id]);

        // Menggunakan laravel eloquent
        // products::where('id', $id)->delete();

        return redirect()->route('product.index')->with('success', 'Data Product berhasil dihapus');
    }
}
