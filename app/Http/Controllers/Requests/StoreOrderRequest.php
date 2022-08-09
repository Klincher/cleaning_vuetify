<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|max:13',
            'first_name' => 'required|alpha|max:100',
            'last_name' => 'required|alpha|max:100',
            'email' => 'required|email:rfc',
            'address' => 'required|max:255',
            'area' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Please enter a Phone ot Huys',
            'first_name.required' => 'Please enter a First Name',
            'last_name.required' => 'Please enter a Last Name',
            'email.required' => 'Please enter an Email',
            'address.required' => 'Please enter a Address',
            'area.required' => 'Please enter a Area'
        ];
    }
}
