<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function all()
    {
        return Product::with('productCategory')->search()->get();
    }

    public function find($where)
    {
        return Product::with('productCategory')->where($where)->firstOrFail();
    }

    public function store($request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product', 'public');
            $data['image'] = Storage::url($path);
        }

        return Product::create($data);
    }

    public function update($request, $id)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product', 'public');
            $data['image'] = Storage::url($path);
        }

        $product = Product::findOrFail($id);
        return $product->update($data);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        return $product->delete();
    }
}
