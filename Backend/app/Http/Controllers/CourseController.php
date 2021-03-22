<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Resources\CourseResource;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller {
	public function index() {
		$courses = Course::get();
		return $this->response($courses);
	}

	private function response($courses) {
		return new JsonResponse([
			'courses' => (object)CourseResource::collection($courses->keyBy('id'))->jsonSerialize(),
		]);
	}
}
