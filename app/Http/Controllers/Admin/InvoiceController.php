<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $data['invoices'] = $this->checkoutService->invoices();
        return Inertia::render('Admin/Invoice/Index', $data);
    }

    public function show(string $id)
    {
        $data['invoice'] = $this->checkoutService->invoice($id);
        return Inertia::render('Admin/Invoice/Show', $data);
    }
}
