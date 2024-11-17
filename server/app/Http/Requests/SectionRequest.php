<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait; 
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SectionRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'section_code' => "required|string|max:255",
            'section_name' => "required|string|max:100",
        ];
    }
    public function messages(): array {
        return [ 
            
            'section_code.required' => 'section code is required.',
            'section_code.string' => 'section code must be string.',
            'section_name.required' => 'section name is required.',
            'section_name.string' => 'section name must be string.',
        ];
    }
    public function failedValidation(Validator $validator): array{
        $response = $this->failedValidationResponse($validator->errors());
        throw new HttpResponseException(response()->json($response, 200));
    }
}
