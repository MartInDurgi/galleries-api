<?php

namespace App\Http\Requests;

use App\Rules\PhotoFormat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;




class StoreGalleryRequest extends FormRequest
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
            'title' => 'required|min:2|max:255|string|unique:galleries',
            'body' => 'max:1000|string',
            'user_email' => 'required|exists:users,email',
            "urls" => 'required|array',
            "urls.*.*"  => ['url', new PhotoFormat],
        ];
    }
}
//  ,