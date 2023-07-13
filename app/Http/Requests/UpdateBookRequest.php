<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tensach' => 'required|regex:/\S/',
            'soluong' => 'required|integer|regex:/\S/',
            'gia' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|regex:/\S/',
            'maloai' => 'required',
            'sotap' => 'required|integer|regex:/\S/',
            'anh' => 'image',
            'ngaynhap' => 'date',
            'tacgia' => 'required|string|regex:/\S/',
        ];
    }
}
