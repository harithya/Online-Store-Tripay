<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoices";

    protected $guarded = ['id'];

    protected $casts = [
        'raw_response' => 'array',
    ];

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function scopeSearch($query)
    {
        return $query->when(request()->search, function ($q) {
            return $q->where('tripay_reference', 'like', '%' . request()->search . '%')
                ->orWhere('buyer_email', 'like', '%' . request()->search . '%')
                ->orWhere('buyer_phone', 'like', '%' . request()->search . '%');
        });
    }
}
