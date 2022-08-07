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
        Schema::create('category_menu', function (Blueprint $table) {
            // $table->unsignedBigInteger('catagory_id');
            // $table->unsignedBigInteger('menu_id');

            $table->foreignId('catagory_id')->references('id')->on('catagories');
            $table->foreignId('menu_id')->references('id')->on('menus');
            // $table->foreignId('category_id')->constrained('catagories');
            // $table->foreignId('menu_id')->constrained('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_menu');
    }
};
