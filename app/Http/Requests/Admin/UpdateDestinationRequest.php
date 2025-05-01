<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
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
            'name' => 'required|string',
            'distance' => 'required|string',
            'travel_time' => 'required|string',
            'description' => 'required|string',
            'image_png' => 'nullable|file|mimes:jpeg,jpg,png,svg,webp,gif,avif|max:2048'
        ];
    }
}
