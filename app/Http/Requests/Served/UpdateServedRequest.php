<?php

namespace App\Http\Requests\Served;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServedRequest extends FormRequest
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
            'id' => 'required|exists:serveds,id',
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'address_id' => 'required|exists:addresses,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }
}
