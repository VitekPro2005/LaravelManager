<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:255|min:3',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|min:5|max:35000'
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => 'Текст поста',
        ];
    }
}
