<?php

namespace App\Http\Requests\Panel\User;

use App\Rules\Nationality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name'=>'required|min:0',
            'family'=>'required|min:0',
            'username'=>['required','min:0',Rule::unique('users','username')->ignore($this->user)],
            'side'=>'required|min:0',
            'city_id'=>'required|min:0|exists:cities,id',
            'nationality'=>['required',new Nationality,Rule::unique('users','nationality')->ignore($this->user)],
            'phone_number'=>['required','min:11','max:11',Rule::unique('users','phone_number')->ignore($this->user)],
            'brand_id'=>'required|exists:brands,id',
            'role_id'=>'required|exists:roles,id',
            'password'=>['required',Password::min(8)],
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:5000'
        ];

    }
}
