<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('month');
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->integer('price')->nullable();
            $table->longText('content_1')->nullable();
            $table->longText('content_2')->nullable();
            $table->string('file')->nullable();
            $table->boolean('in_slider')->default(false);
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
