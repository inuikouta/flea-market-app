<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // bigint unsigned, primary key, not null
            $table->string('name', 255); // not null
            $table->string('email', 255)->unique(); // not null, unique
            $table->string('password', 255); // not null
            $table->string('postal_code', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('building_name', 255)->nullable();
            $table->timestamp('created_at')->useCurrent(); // not null (by default)
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // not null (by default)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
