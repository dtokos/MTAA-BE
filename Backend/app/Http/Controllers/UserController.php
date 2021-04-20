<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller {
	public function update(UpdateRequest $request, User $user) {
		$this->authorize('update', $user);
		
		$user->name = $request->name;
		$user->email = $request->email;
		if (!empty($request->password))
			$user->password = Hash::make($request->password);
		if (!empty($request->profile_image))
			$user->profile_image = (string)Image::make($request->profile_image)->fit(75)->encode('data-url');
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
