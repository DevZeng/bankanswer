<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class BaseRequest extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors()->first();
        return [$message]; // TODO: Change the autogenerated stub
    }
    public function response(array $errors)
    {
        return new JsonResponse([
            'return_msg'=>$errors[0],
            'return_code'=>'FAIL'
        ]);
    }
}
