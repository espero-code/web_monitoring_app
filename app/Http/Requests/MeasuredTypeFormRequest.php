<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasuredTypeFormRequest extends FormRequest
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
        $isRequired = request()->isMethod("POST") ?"required|": "";
        return [
            //
            'name' => $isRequired.'string',
			'description' => $isRequired.'string',
			'min_value' => $isRequired.'string',
			'max_value' => $isRequired.'string'

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([

        ]);
    }
}
