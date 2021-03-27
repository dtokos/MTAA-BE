<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UsersPolicy {
	use HandlesAuthorization;

	public function update(User $user, User $subject) {
		return $user->id == $subject->id;
	}
}
