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
        }elseif(request()->routeIs('blogs.update')) {
            $imgValidation = 'sometimes';
        };
        
        return [
            'title' => ['required'],
            'content' => ['required'],
            'img' => [$imgValidation,'image|size:1024','mimes:jpeg,png,svg,webp'],
            'slug' => ['required'],
            'status' => ['required']
        ];
    }
}
