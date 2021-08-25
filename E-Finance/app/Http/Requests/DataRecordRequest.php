<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRecordRequest extends FormRequest
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
            'sub_categories_id' => 'required|integer|exists:sub_categories,id',
            'description' => 'required|max:255',
            'transaction' => 'required|integer'
        ];
    }
}
