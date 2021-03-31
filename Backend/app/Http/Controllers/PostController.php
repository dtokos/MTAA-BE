<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Course;
use App\Models\Category;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;

class PostController extends Controller {
	public function index(Course $course) {
		$posts = $course->posts;
		$users = User::whereIn('id', $posts->pluck('user_id'))->get();
		$categories = Category::whereIn('id', $posts->pluck('category_id'))->get();
		
		return $this->response($posts, $users, $categories);
	}

	public function store(CreateRequest $request, Course $course) {
		$category = Category::find($request->category_id);
		$user = Auth::user();
		
		$post = new Post();
		$post->title = $request->title;
		$post->content = $request->content;
		$post->course()->associate($course);
		$post->category()->associate($category);
		$post->user()->associate($user);
		$post->save();

		return $this->singlesResponse($post, $user, $category);
	}

	public function update(UpdateRequest $request, Course $course, Post $post) {
		$this->authorize('update', $post);

		$category = Category::find($request->category_id);
		$user = $post->user;

		$post->title = $request->title;
		$post->content = $request->content;
		$post->category()->associate($category);
		$post->save();

		return $this->singlesResponse($post, $user, $category);
	}

	public function destroy(Course $course, Post $post) {
		$this->authorize('destroy', $post);

		$user = $post->user;
		$category = $post->category;

		$post->delete();

		return $this->singlesResponse($post, $user, $category);
	}

	private function singlesResponse($post, $user, $category) {
		return $this->response(
			new Collection([$post]),
			new Collection([$user]),
			new Collection([$category]),
		);
	}

	private function response($posts, $users, $categories) {
		return new JsonResponse([
			'posts' => (object)PostResource::collection($posts->keyBy('id'))->jsonSerialize(),
			'users' => (object)UserResource::collection($users->keyBy('id'))->jsonSerialize(),
			'categories' => (object)CategoryResource::collection($categories->keyBy('id'))->jsonSerialize(),
		]);
	}
}
