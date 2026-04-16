<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\SecureImage;

class StoreBeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'gambar' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072', new SecureImage],
            'kategori' => 'nullable|string|max:50',
            'is_published' => 'boolean',
        ];
    }
}
