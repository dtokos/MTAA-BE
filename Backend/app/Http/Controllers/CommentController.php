<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Course;
use App\Models\Comment;
use App\Http\Requests\Comments\CreateRequest;
use App\Http\Requests\Comments\UpdateRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller {
	public function index(Course $course, Post $post) {
		$comments = $post->comments;
		$users = User::whereIn('id', $comments->pluck('user_id'))->get();
		
		return $this->response($comments, $users);
	}

	public function store(CreateRequest $request, Course $course, Post $post) {
		$user = Auth::user();
		
		$comment = new Comment();
		$comment->content = $request->content;
		$comment->post()->associate($post);
		$comment->user()->associate($user);
		$comment->save();

		return $this->singlesResponse($comment, $user);
	}

	public function update(UpdateRequest $request, Course $course, Post $post, Comment $comment) {
		$this->authorize('update', $comment);

		$user = $comment->user;

		$comment->content = $request->content;
		$comment->save();

		return $this->singlesResponse($comment, $user);
	}

	public function destroy(Course $course, Post $post, Comment $comment) {
		$this->authorize('destroy', $comment);

		$user = $comment->user;

		$comment->delete();

		return $this->singlesResponse($comment, $user);
	}

	private function singlesResponse($comment, $user) {
		return $this->response(
			new Collection([$comment]),
			new Collection([$user])
		);
	}

	private function response($comments, $users) {
		return new JsonResponse([
			'comments' => (object)CommentResource::collection($comments->keyBy('id'))->jsonSerialize(),
			'users' => (object)UserResource::collection($users->keyBy('id'))->jsonSerialize()
		]);
	}
}
