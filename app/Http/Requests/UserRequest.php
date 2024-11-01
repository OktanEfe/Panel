<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true; // Kullanıcı yetkilendirme kontrolü yapılabilir. Şimdilik 'true' yapın.
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'phone_number' => 'required|numeric|digits:11',
      'surname' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
    ];
  }
}
