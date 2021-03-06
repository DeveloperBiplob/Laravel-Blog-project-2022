<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        if ($this->method() === 'POST') {
            return [
                'name' => "required|unique:posts,name|max:100|min:5",
                'category_id' => "required",
                'sub_category_id' => "required",
                'description' => "required|string",
                'image' => "required|mimes:png,jpg,jpeg",
            ];
        } else {
            return [
                'name' => "required|unique:posts,name,{$this->post->id}",
                'category_id' => "required",
                'sub_category_id' => "required",
                'description' => "required|string",
                'image' => "mimes:png,jpg,jpeg",
            ];
        }
    }
}
