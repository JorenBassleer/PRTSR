<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
        return [
            'name' => 'required|max:100|string',
                        Rule::unique('products', 'name'),
            'slug' => 'required|max:10|string',
                        Rule::unique('products', 'slug'),
            'details' => 'required|max:255|string',
            'storage' => 'integer',
            'gender'=> "required|string|max:1",

            'types' => "required|array|min:1|exists:types,name",
            'types.*'=> "required|string|min:1",

            'materials' => "required|array|min:1|exists:materials,name",
            'materials.*'=> "required|string|min:1",
        ];

    }
}
