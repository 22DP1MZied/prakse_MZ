<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_statuses', function (Blueprint $table) {
            $table->id('project_status_id');
            $table->integer('deployment_frequency');
            $table->integer('lead_time_for_change');
            $table->integer('failed_deliveries');
            $table->integer('time_to_restore_service');

            $table->date('day');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('project_statuses');
    }
};
