<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBeritaRequest extends FormRequest
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
            'gambar' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:3072|dimensions:min_width=100,min_height=100',
            'kategori' => 'nullable|string|max:50',
            'is_published' => 'boolean',
        ];
    }
}
