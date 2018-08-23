<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
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
            'name' => 'required|min:5',
            'address' => 'required|min:10',
            'price' => 'required',
            'summary' => 'required',
            'bed_room' => 'required',
            'bath_room' => 'required',
            'room_type' => 'required',
            'city_id' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ];
    }
}
