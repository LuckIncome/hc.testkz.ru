<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditHomeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_sliders', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->change();
            $table->enum('type',['home','about'])->default('home')->after('id');
        });
        Schema::rename('home_sliders', 'sliders');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_sliders', function (Blueprint $table) {
            $table->string('subtitle')->change();
            $table->dropColumn('type');
        });
        Schema::rename('sliders', 'home_sliders');
    }
}
