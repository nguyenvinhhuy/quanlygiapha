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
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('role')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::create('tribe', function (Blueprint $table) {
            $table->id();
            $table->string('name');   
            $table->string('address')->nullable();      
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('faction', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('tribe_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tribe_id')->references('id')->on('tribe')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('address');
            $table->date('dob');
            $table->date('deathday')->nullable();
            $table->integer('father_id')->nullable();
            $table->integer('mother_id')->nullable();
            $table->integer('wife_id')->nullable();
            $table->string('job');
            $table->integer('ordinal');
            $table->unsignedBigInteger('faction_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('faction_id')->references('id')->on('faction')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::create('person_description', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('person_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('person_id')->references('id')->on('person')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');

        Schema::dropIfExists('users');

        Schema::dropIfExists('tribe');

        Schema::dropIfExists('faction');

        Schema::dropIfExists('person');

        Schema::dropIfExists('person_description');
    }
};
