<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
	public function login(LoginRequest $request) {
		$token = Auth::attempt($request->only(['email', 'password']));

		if (!$token)
			return new JsonResponse(['error' => 'Unauthorized.'], 401);

		return new JsonResponse([
			'user' => UserResource::make(Auth::user()),
			'token' => $token,
		]);
	}

	public function logout() {
		Auth::logout();
		return new JsonResponse([], 204);
	}
}
