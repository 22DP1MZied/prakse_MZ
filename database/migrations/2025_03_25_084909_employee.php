<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('name', 20);
            $table->string('surname', 20);
            $table->string('email', 40)->unique();
            $table->foreignId('status')->constrained('statuses');
            $table->foreignId('external_service')->nullable()->constrained('external_services');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('employees');
    }
};
