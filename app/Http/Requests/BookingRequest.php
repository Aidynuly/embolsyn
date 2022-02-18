<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookingRequest extends FormRequest
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
            'from_date'             =>  'required',
            'to_date'               =>  'required',
            'sanatorium_room_id'    =>  'required|exists:sanatorium_rooms,id',
            'count_adults'          =>  'required',
            'count_children'        =>  'required',
//            'users'                 =>  'required|array:min:1',
//            'users.*.name'          =>  'required',
//            'users.*.surname'       =>  'required',
//            'users.*.gender'        =>  'required',
//            'users.*.date_birth'    =>  'required',
//            'users.*.nationality'   =>  'required',
//            'users.*.validity'      =>  'required',
//            'users.*.iin'           =>  'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   =>  false,
            'message'   =>  $validator->errors()->first()
        ], 400));
    }
}
