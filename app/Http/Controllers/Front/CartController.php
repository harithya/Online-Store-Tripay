<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Services\CartService;
use App\Services\TripayService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    protected $cartService, $tripayService;

    public function __construct(CartService $cartService, TripayService $tripayService)
    {
        $this->cartService = $cartService;
        $this->tripayService = $tripayService;
    }

    public function index()
    {
        $data['carts'] = $this->cartService->all();
        $data['payments'] = $this->tripayService->payments();
        return Inertia::render('Front/Cart/Index', $data);
    }

    public function store(CartRequest $request)
    {
        $this->cartService->store($request);

        $route = $request->is_checkout_now ? route('cart.index') : url()->previous();
        return redirect($route)->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function destroy($id)
    {
        $this->cartService->destroy($id);
        return back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
