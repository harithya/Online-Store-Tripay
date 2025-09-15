<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function store(CheckoutRequest $request)
    {
        try {
            $res = $this->checkoutService->store($request->payment_channel);
            return Inertia::location($res['raw_response']['checkout_url']);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        try {
            $this->checkoutService->callback($request);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
