<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name', 255);
            $table->string('brand', 255);
            $table->decimal('price', 10, 0);
            $table->text('description');
            $table->enum('quality', ['良好', '目立った傷や汚れなし', 'やや傷や汚れあり', '状態が悪い']);
            $table->string('image_path', 255);
            $table->timestamps();

            // 外部キー制約（必要であれば）
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
