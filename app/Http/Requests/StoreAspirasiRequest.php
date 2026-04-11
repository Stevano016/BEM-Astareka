<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspirasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'nullable|string|max:255',
            'nim' => 'nullable|string|max:20',
            'prodi' => 'nullable|string|max:100',
            'kategori' => 'required|string|max:50',
            'pesan' => 'required|string',
        ];
    }
}
