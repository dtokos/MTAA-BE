<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained();
			$table->foreignId('course_id')->constrained();
			$table->foreignId('category_id')->constrained();
			$table->string('title');
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('posts');
	}
}
