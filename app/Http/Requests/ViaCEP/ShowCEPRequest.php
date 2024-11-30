<?php

namespace App\Http\Requests\ViaCEP;

use Illuminate\Foundation\Http\FormRequest;

class ShowCEPRequest extends FormRequest
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
            'zipcode' => 'required|integer',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'zipcode' => $this->input('zipcode'),
        ]);
    }
}
