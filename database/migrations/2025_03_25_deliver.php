<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('delivers', function (Blueprint $table) {
            $table->id('deliver_id');
            $table->string('name', 30);
            $table->date('date');
            $table->foreignId('project_id')->constrained('projects');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('delivers');
    }
};
