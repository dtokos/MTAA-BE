<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Post;

class PostsPolicy {
	use HandlesAuthorization;

	public function update(User $user, Post $post) {
		return $user->id == $post->user_id;
	}

	public function destroy(User $user, Post $post) {
		return $user->id == $post->user_id;
	}
}
