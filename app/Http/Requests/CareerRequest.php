<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'location' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:5000',
            'experience' => 'required|in:' . implode(',', \App\Models\Career::$experience),
            'category' => 'required|in:' . implode(',', \App\Models\Career::$category),
        ];
    }
}
