<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'activity_date' => 'required|date',
        'status'      => 'required|string',
        'category_id' => 'required', 
        'poster'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ];
    }
}
