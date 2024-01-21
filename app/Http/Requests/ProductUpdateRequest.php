<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->status->isPenjual();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'file|image',
            'order_type' => 'required',
            'status' => 'required',
        ];
    }
}
