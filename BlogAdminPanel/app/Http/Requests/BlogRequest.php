<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if(request()->routeIs('blogs.store')) {
            $imgValidation = 'required';
            $statusValidation = 'nullable';
            $categoryValidation = 'nullable';
            $tagValidation = 'sometimes';
        }elseif(request()->routeIs('blogs.update')) {
            $imgValidation = 'sometimes';
            $statusValidation = 'boolean';
            $categoryValidation = 'sometimes';
            $tagValidation = 'sometimes';
        }

        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
            'img' => [$imgValidation, 'image', 'max:2048', 'mimes:png,jpg,jpeg,gif,jfif,webp'],
            'slug' => ['string'],
            'status' => [$statusValidation],
            'category_id' => [$categoryValidation,'integer'],
            'tags' => [$tagValidation,'array'],
            'tags.*' => 'exists:tags,id',
        ];
    }
}
