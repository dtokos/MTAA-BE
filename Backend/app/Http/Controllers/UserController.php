<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	public function update(UpdateRequest $request, User $user) {
		$user->name = $request->name;
		$user->email = $request->email;
		if (!empty($request->password))
			$user->password = Hash::make($request->password);
		$user->save();

		return $this->singlesResponse($user);
	}

	private function singlesResponse($user) {
		return $this->response(
			new Collection([$user]),
		);
	}

	private function response($users) {
		return new JsonResponse([
			'users' => (object)UserResource::collection($users->keyBy('id'))->jsonSerialize(),
		]);
	}
}
