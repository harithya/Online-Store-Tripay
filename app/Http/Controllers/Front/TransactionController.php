<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $data['invoices'] = $this->checkoutService->invoices();
        return Inertia::render('Front/Transaction/Index', $data);
    }

    public function show($reference)
    {
        $data['invoice'] = $this->checkoutService->invoice($reference);
        return Inertia::render('Front/Transaction/Show', $data);
    }
}
