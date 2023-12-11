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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uuid');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('location_id');
            // $table->unsignedBigInteger('created_by');
            $table->string('job_type');
            $table->integer('amount_need_employee');
            $table->longText('description');
            $table->date('expiration_date');
            $table->boolean('offers_remote_work');
            $table->boolean('is_ranged_salary');
            $table->boolean('is_visible_salary');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('min_experience');
            $table->integer('max_experience');

            $table->foreign('position_id')
            ->on('positions')
            ->references('id')
            ->onDelete('cascade');

            $table->foreign('location_id')
            ->on('locations')
            ->references('id')
            ->onDelete('cascade');

            // $table->foreign('created_by')
            // ->on('users')
            // ->references('id')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
