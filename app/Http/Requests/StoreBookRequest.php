<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
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
            'masach' => 'required|string|unique:sach',
            'tensach' => 'required|regex:/\S/',
            'soluong' => 'required|integer|regex:/\S/',
            'gia' => 'required|integer',
            'maloai' => 'required',
            'sotap' => 'required|integer|regex:/\S/',
            'anh' => 'required|image',
            'ngaynhap' => 'required|date',
            'tacgia' => 'required|string|regex:/\S/',
        ];
    }
}
