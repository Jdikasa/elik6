<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
        //     'nom' => ['required', 'string', 'max:255'],
        //     'societe_id' => ['required', 'numeric'],
        //     'phone' => ['required', 'string', 'max:20'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        //     'country_id' => ['required', 'numeric'],
        //     'fax' => ['string', 'max:25'],
        //     'description' => ['string']
        ];
    }
}
