<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        // switch($this->method())
        // {
        //     case 'POST' : 
        //         return [
        //             'title' => 'required|min:10|max:255',
        //             'shortDetail' => 'required',
        //             'detail' => 'required',
        //             'thumb' => 'required',
        //             'status' => 'required|boolean',
        //             'datePublic' => 'required',
        //             'categoryId' => 'required|numberic',
        //         ];
        //     case 'PUT' :
        //         return [
        //             'title' => 'min:10|max:255',
        //             'categoryId' => 'numeric',
        //             'status' => 'boolean',
        //         ];
        // }
        
    }

    public function messages()
    {
        // return [
        //     'title.required' => 'Title không được để trống',
        //     'title.min' => 'Title phải nhiều hơn 10 ký tự',
        //     'title.max' => 'Title không được vượt quá 255 ký tự',
        //     'des.required' => 'Mô tả ngắn(des) không được để trống',
        //     'detail.required' => 'Detail không được để trống',
        //     'categoryId.required' => 'Category không được để trống',
        //     'categoryId.numeric' => 'Category phải là dạng số',
        //     'status.required' => 'Public không được để trống',
        //     'status.boolean' => 'Public phải là dạng bolean(true, false)',
        //     // 'data_public.required' => 'data_public không được để trống',
        //     // 'position.required' => 'position không được để trống',
        // ];
    }
}
