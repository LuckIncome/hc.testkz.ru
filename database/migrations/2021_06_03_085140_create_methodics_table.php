<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methodics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('excerpt');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->longText('symptoms')->nullable();
            $table->longText('program')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('sort_id')->default(1);
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
        Schema::dropIfExists('methodics');
    }
}
