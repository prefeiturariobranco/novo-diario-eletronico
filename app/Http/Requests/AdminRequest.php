<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'number'     => 'required|unique:items,number,NULL,id,deleted_at,NULL',
            'disclosure' => 'required|date_format:d/m/Y',
            'anexo'      => 'required',
        ];
    }
}
