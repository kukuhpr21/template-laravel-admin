<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_has_status', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('user_id', 36)->nullable(false);
            $table->string('status_id', 50)->nullable(false);
            $table->primary('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('status_id')->on('statuses')->references('id')->onDelete('restrict')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_statuses');
    }
};
