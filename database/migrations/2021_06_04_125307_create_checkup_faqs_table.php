<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_faqs', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->string('title');
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('checkup_faqs');
    }
}
