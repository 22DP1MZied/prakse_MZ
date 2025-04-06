<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('external_services', function (Blueprint $table) {
            $table->id('external_service_id');
            $table->enum('type', ['GitHub', 'GitLab', 'Bitbucket']);
            $table->string('url', 300);
            $table->text('credentials');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('external_services');
    }
};
