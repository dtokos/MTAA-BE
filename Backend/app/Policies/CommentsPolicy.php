<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Comment;

class CommentsPolicy {
	use HandlesAuthorization;

	public function update(User $user, Comment $comment) {
		return $user->id == $comment->user_id;
	}

	public function destroy(User $user, Comment $comment) {
		return $user->id == $comment->user_id;
	}
}
