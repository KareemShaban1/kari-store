<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'brand_id' => 'nullable|exists:brands,id',
            'slug' => 'nullable|unique:products,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'numeric',
            'compare_price' => 'nullable|numeric',
            'quantity' => 'integer',
            'featured' => 'boolean',
            'status' => 'in:active,draft,archived',
        ];
    }
}