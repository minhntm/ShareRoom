<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
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
            'room_id' => 'required',
            'star' => 'required',
            'comment' => 'required|min:5',
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            toastr()->error($message);
        }

        return $validator->errors()->all();
    }
}
