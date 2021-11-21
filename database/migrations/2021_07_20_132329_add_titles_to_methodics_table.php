<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitlesToMethodicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('methodics', function (Blueprint $table) {
            $table->string('symptom_title')->nullable()->after('image');
            $table->string('program_title')->nullable()->after('symptom_title');
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
            $table->dropColumn(['symptom_title','program_title']);
        });
    }
}
