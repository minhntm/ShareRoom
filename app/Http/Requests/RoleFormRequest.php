<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
            'name' => 'required',
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
