<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $img = $this->route('blog.update') ? 'sometimes|string' : 'required|string';
        $status = $this->route('blog.update') ? 'sometimes|string' : 'required|string';

        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'img' => [$img, 'image', 'max:2048', 'mimes:png,jpg,jpeg,gif,jfif,webp'],
            'slug' => ['string'],
            'status' => [$status]
        ];
    }
}
