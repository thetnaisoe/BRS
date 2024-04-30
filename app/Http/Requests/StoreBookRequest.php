<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|date|before:now',
            'pages' => 'required|integer|min:1',
            'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'description' => 'nullable',
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,id',
            'in_stock' => 'required|integer|min:0',
            'cover_image' => 'nullable|url',
        ];
    }
}
