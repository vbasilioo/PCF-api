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
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('excluded_from_rounds')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('date_of_birth');
            $table->enum('role', ['ADMINISTRADOR', 'PRESIDÊNCIA', 'GESTÃO', 'VOLUNTÁRIO'])->default('VOLUNTÁRIO');
            $table->string('profile_image')->nullable();
            $table->uuid('department_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments');
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('country')->default('BRASIL');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('serveds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('date_of_birth');
            $table->uuid('department_id');
            $table->uuid('address_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('address_id')->references('id')->on('addresses');
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['PENDENTE', 'EM PROGRESSO', 'FINALIZADO', 'CANCELADO'])->default('PENDENTE');
            $table->uuid('user_id');
            $table->uuid('department_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('content');
            $table->uuid('author_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('financials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description');
            $table->double('amount');
            $table->enum('type', ['RECEITA', 'DESPESAS']);
            $table->uuid('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('rounds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('round_number')->default(1);
            $table->uuid('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('round_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('round_id');
            $table->uuid('user_id');
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('round_id')->references('id')->on('rounds');
        });

        Schema::create('available_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('name');
            $table->string('area');
            $table->boolean('available_on_saturday')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('route');
            $table->string('method');
            $table->json('data')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
        Schema::dropIfExists('available_users');
        Schema::dropIfExists('round_users');
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('financials');
        Schema::dropIfExists('news');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('serveds');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
