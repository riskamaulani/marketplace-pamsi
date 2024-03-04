<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->status->isPembeli();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'total' => 'required|numeric',
            'produk_id' => 'required|exists:produks,id',
            'bukti' => 'required|file|image',
            'status' => 'required',
        ];
    }
}
