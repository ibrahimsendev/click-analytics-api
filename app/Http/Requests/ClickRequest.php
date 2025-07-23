<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClickRequest extends FormRequest
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
        return [
            'url' => 'required|url|max:2048',
            'user_agent' => 'nullable|string|max:1024',
            'ip_address' => 'nullable|ip',
        ];
    }
}
