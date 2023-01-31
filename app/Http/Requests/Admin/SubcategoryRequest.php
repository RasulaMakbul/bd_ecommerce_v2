<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $imageValidationRules = 'image|mimes:jpg,png,jpeg,gif,jpeg';

        if ($this->isMethod('post')) {
            $imageValidationRules = 'required|' . $imageValidationRules;
        }
        return [
            'name' => 'required|min:2|max:100|unique:sub_categories,name,' . $this->id,
            'slug' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:900',
            'image' => $imageValidationRules,

        ];
    }
}
