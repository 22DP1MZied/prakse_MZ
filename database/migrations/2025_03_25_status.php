<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id('status_id');
            $table->string('status_name', 30);
            $table->integer('total_commits');
            $table->integer('total_files_changed');
            $table->integer('total_lines_added');
            $table->integer('total_lines_removed');
            $table->integer('total_messages_sent');
            $table->integer('reaction');
            $table->integer('ratio');
            $table->date('day');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('statuses');
    }
};
