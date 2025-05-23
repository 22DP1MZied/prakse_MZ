<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sentry_logs', function (Blueprint $table) {
            $table->id();
            $table->string('error_message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sentry_logs');
    }
};
