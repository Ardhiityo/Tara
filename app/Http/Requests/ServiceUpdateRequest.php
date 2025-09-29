<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'unique:services,title,' . request()->route('service')->id],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:1'],
            'photo' => ['nullable', 'image', 'max:1000'],
            'description' => ['required', 'min:10']
        ];
    }
}
