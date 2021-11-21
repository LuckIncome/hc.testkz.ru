<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditIcontextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icontexts', function (Blueprint $table) {
            $table->string('title')->after('type');
            $table->text('text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icontexts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->text('text')->change();
        });
    }
}
