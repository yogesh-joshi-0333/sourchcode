<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ValidationRequests;

class YourClassNameRequest extends ValidationRequests
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
$default_max_value = 10 * 1024;
        return [
              'input_key' => ['required', 'exists:tableName,id'],
              "input_key" => "required|numeric"
              'input_key' => 'required|in:accept,delete',
              'input_key.*.date' => 'required|date',
              'input_key' => ['in:Accept,Reject,Pending'],
              'input_key' => 'required|string',
              'input_key' => 'sometimes|mimes:jpg,jpeg,png,pdf',
              'input_key' => 'required|max:100',
              'input_key' => 'boolean',
              'input_key' => 'required|string|max:100|regex:/^[\pL\s\-]+$/',
              'input_key' => 'required|string|max:100|regex:/^[\pL\s\-]+$/',
              'input_key' => 'nullable|max:'.$default_max_value.'|mimes:jpg,jpeg,png,gif',
              'input_key' => 'nullable|string|max:150',
              'input_key' => 'nullable|string|in:male,female,Male,Female',
              'input_key' => 'nullable|string|email',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'key' => decryptId($this->input('key')),
        ]);
    }
}
