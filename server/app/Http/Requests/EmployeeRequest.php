<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait; 
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
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
            'employee_id' => $this->method() === 'POST' ? "required|unique:employees,employee_id,NULL,id,deleted_at,NULL" 
            :"required|unique:employees,employee_id,{$this->route('employee')},id,deleted_at,NULL" ,
            'first_name' => "required|string",
            'last_name' => "required|string",
            'middle_name' => "required|string",
            // 'section_id' => 'required|integer|exists:sections,id',

           
        ];
    }

    public function messages(): array {
        return [ 
            'employee_id.required' => 'Employee ID is required.', 
            'employee_id.unique' => 'Employee ID is required.',        
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be string.',
            'middle_name.required' => 'Middle name is required.',
            'middle_name.string' => 'Middle name must be string.',
            'section_id.required' => 'section ID is required.',
            'section_id.integer' => 'section ID must be an integer.',
            'section_id.exists' => 'The selected section is invalid.',
  
        ];
    }
    public function failedValidation(Validator $validator): array{
        $response = $this->failedValidationResponse($validator->errors());
        throw new HttpResponseException(response()->json($response, 200));
    }
}

