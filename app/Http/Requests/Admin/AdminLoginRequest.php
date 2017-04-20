<?php

<<<<<<< HEAD
namespace App\Http\Requests\Admin;
=======
namespace App\Http\Requests;
>>>>>>> a4e4ecda2533c84d35e134fb6488c569ed266aca

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
<<<<<<< HEAD
            'email' => 'required',
            'password' => 'required',
        ];

=======
            'name' => 'required',
            'password' => 'required',
        ];
>>>>>>> a4e4ecda2533c84d35e134fb6488c569ed266aca
    }

    public function messages()
    {
        return [
<<<<<<< HEAD
            'email.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
=======
            'name.required' => '用户名不能为空',
            'name.required' => '密码不能为空',
>>>>>>> a4e4ecda2533c84d35e134fb6488c569ed266aca
        ];
    }
}
