<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'content' => 'required|string',
		];
	}
}
