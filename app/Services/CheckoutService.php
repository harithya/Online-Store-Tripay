<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutService
{
    public function invoices()
    {
        return Invoice::withCount('invoiceDetails')
            ->orderBy('created_at', 'desc')
            ->search()
            ->when(!auth()->user()->is_admin, function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->get();
    }

    public function store($paymentChannel)
    {
        try {
            DB::beginTransaction();
            $cartService = app(CartService::class);

            $carts = $cartService->all();
            $total = $carts->reduce(function ($total, $cart) {
                return $total + $cart->price;
            }, 0);


            $invoice = Invoice::create([
                'amount' => $total,
                'buyer_email' => auth()->user()->email,
                'buyer_phone' => auth()->user()->phone,
                'user_id' => auth()->user()->id,
            ]);

            foreach ($carts as $cart) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $cart->id,
                    'quantity' => 1,
                    'price' => $cart->price,
                ]);
            }

            DB::commit();
            DB::afterCommit(function () use ($paymentChannel, $carts, $total, $invoice) {
                $tripay = $this->tripay($paymentChannel, $carts, $total);
                $invoice->update([
                    'tripay_reference' => $tripay['reference'],
                    'raw_response' => $tripay,
                ]);

                session()->put('cart', []);
            });

            return $invoice;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    private function tripay($paymentChannel, $carts, $total)
    {
        $tripayService = app(TripayService::class);
        $codeInvoice = 'INV-' . date('YmdHis') . '-' . rand(1000, 9999);

        $payload = [
            'method' => $paymentChannel,
            'merchant_ref' => $codeInvoice,
            'amount' => $total,
            'customer_name' => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->phone,
            'order_items' => collect($carts)->map(function ($cart) {
                return [
                    'sku' => $cart->sku,
                    'name' => $cart->name,
                    'price' => $cart->price,
                    'quantity' => 1,
                    'product_url' => route('home.show', $cart->slug),
                    'image_url' => $cart->image
                ];
            }),
            'return_url' => route('home.index'),
        ];

        return $tripayService->checkout($payload);
    }

    public function invoice($reference)
    {
        return Invoice::with('invoiceDetails.product')
            ->where('tripay_reference', $reference)
            ->when(!auth()->user()->is_admin, function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->firstOrFail();
    }

    public function callback($request)
    {
        $invoice = Invoice::where('tripay_reference', $request->reference)->firstOrFail();
        $invoice->update([
            'raw_response' => $request->all(),
        ]);

        return  $invoice;
    }
}
