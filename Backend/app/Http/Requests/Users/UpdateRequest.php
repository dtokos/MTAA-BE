<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {
	public function authorize() {
		return true;
	}

	public function rules() {
		$user = $this->route('user');

		return [
			'name' => 'required|string',
			'email' => 'required|email|unique:users,email,'. $user->id .',id',
			'password' => 'nullable|string|min:6',
			'profile_image' => 'nullable|base64image',
		];
	}
}
