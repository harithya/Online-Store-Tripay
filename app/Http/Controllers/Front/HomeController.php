<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data['products'] = $this->productService->all();
        $data['categories'] = ProductCategory::all();
        return Inertia::render('Front/Home/Index', $data);
    }

    public function show($slug)
    {
        $data['product'] = $this->productService->find(['slug' => $slug]);
        return Inertia::render('Front/Home/Show', $data);
    }
}
