<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CheckRequest extends FormRequest
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
        if($this->segment(2)){
            return [
                'check_in' => 'required',
                'check_out' => 'required'
            ];

        } else {
            return [
                'check_in' => 'required_without:check_out'
                ];
        }
    }
}
