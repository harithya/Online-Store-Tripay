<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data['products'] = $this->productService->all();
        return Inertia::render('Admin/Product/Index', $data);
    }

    public function create()
    {
        $data['categories'] = ProductCategory::all();
        return Inertia::render('Admin/Product/Create', $data);
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->productService->store($request);
            return to_route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['product'] = $this->productService->find(['id' => $id]);
        $data['categories'] = ProductCategory::all();
        return Inertia::render('Admin/Product/Edit', $data);
    }

    public function update(ProductRequest $request, string $id)
    {
        try {
            $this->productService->update($request, $id);
            return to_route('admin.product.index')->with('success', 'Produk berhasil diubah');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->productService->destroy($id);
            return back()->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
