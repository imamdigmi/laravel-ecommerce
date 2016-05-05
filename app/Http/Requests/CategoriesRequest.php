<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Category;

class CategoriesRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('POST')) {
            $rules['title'] = 'required|string|max:255|unique:categories,title';
        } else {
            $category = Category::findOrFail($this->segment(2));
            $rules['title'] = 'required|string|max:255|unique:categories,title,' . $category->id;
        }
        $rules['parent_id'] = 'exists:categories,id';
        return $rules;
    }
}
