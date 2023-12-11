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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uuid');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('birthdate');
            $table->string('photo_url')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_business_category')->nullable();
            $table->string('company_logo_url')->nullable();
            $table->longText('company_description')->nullable();
            $table->integer('company_amount_employee')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
