<?php

namespace App\Http\Requests\Panel\Config;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'photo_baner'=>'nullable|mimes:png,jpg,jpeg|max:5000',
            'dashboard_baner'=>'nullable|mimes:png,jpg,jpeg|max:5000'
        ];
    }
}
