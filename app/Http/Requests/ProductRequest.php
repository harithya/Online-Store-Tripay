<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku,' . $productId,
            'price' => 'required|numeric',
            'product_category_id' => 'required|exists:product_categories,id',
            'description' => 'required|string|min:10',
            'image' => ($this->isMethod('post') ? 'required' : 'nullable')
                . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
