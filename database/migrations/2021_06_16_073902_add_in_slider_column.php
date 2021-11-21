<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInSliderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('methodics', function (Blueprint $table) {
            $table->boolean('in_slider')->default(false)->after('program');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('methodics', function (Blueprint $table) {
            $table->dropColumn('in_slider');
        });
    }
}
