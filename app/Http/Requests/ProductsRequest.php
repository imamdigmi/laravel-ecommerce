<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Product;

class ProductsRequest extends Request
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
            $rules['photo'] = 'required|image|mimes:jpeg,png|max:10240';
            $rules['name'] = 'required|unique:products';
        } else {
            $product = Product::findOrFail($this->segment(2));
            $rules['name'] = 'required|unique:products,name,' . $product->id;
            $rules['photo'] = 'image|mimes:jpeg,png|max:10240';
        }
        $rules['model'] = 'required';
        $rules['price'] = 'required|numeric|min:1000';
        return $rules;
    }
}
