<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest {
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'category_id' => 'required|integer|exists:categories,id',
			'title' => 'required|string',
			'content' => 'required|string',
		];
	}
}
