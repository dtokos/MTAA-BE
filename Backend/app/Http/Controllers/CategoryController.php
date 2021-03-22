<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller {
	public function index() {
		$categories = Category::get();
		return $this->response($categories);
	}

	private function response($categories) {
		return new JsonResponse([
			'categories' => CategoryResource::collection($categories->keyBy('id')),
		]);
	}
}
