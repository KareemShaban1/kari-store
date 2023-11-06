<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:stores,slug',
            'description' => 'nullable|string',
            'logo_image' => 'nullable',
            'cover_image' => 'nullable',
            'status' => 'required|in:active,inactive',
            'percent' => 'nullable|integer',
            'phone_number' => 'nullable|string',
            'governorate_id' => 'nullable|exists:destinations,id',
            'city_id' => 'nullable|exists:destinations,id',
            'neighborhood_id' => 'nullable|exists:destinations,id',
            'street_address' => 'nullable|string',
            'featured' => 'boolean',
        ];
    }
}