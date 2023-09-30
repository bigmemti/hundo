<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostWithCategoryRequest extends FormRequest
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
        return [
            'title' =>'string|min:4|max:255',
            'category_id' => ['numeric','required', Rule::in(Category::all(['id'])->pluck('id')->toArray())],
            'image'=> 'image|mimes:png,jpg,jpeg|max:2048',
            'body' => 'string|min:40|max:1000'
        ];
    }
}
