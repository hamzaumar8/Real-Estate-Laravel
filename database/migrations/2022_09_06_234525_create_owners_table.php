<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('title', ['Prof.', 'Dr.', 'Rev.', 'Mr.', 'Mrs.', 'Miss', 'Ms.']);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->text('address');
            $table->string('passport_picture')->nullable();
            $table->string('tin')->unique()->nullable();
            $table->string('nid')->unique();
            $table->uuid('uuid');
            $table->string('token');
            $table->enum('status', ['pending', 'successful', 'canceled', 'expired'])->default('pending');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
};