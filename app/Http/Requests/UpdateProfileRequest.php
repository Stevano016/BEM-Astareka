<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Keys are dynamic in this app, so we can just return an empty array or basic validation
            '*' => 'nullable|string',
        ];
    }
}
