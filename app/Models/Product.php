<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    // boot create
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name) . '-' . Str::random(5);
            $model->reference = config('tripay.merchant_code');
        });
    }

    public function scopeSearch($query)
    {
        return $query->when(request()->search, function ($q) {
            return $q->where('name', 'like', '%' . request()->search . '%')
                ->orWhere('description', 'like', '%' . request()->search . '%');
        })
            ->when(request()->categories, function ($q) {
                return $q->whereIn('product_category_id', request()->categories);
            });
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
