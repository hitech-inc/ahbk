<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleKzAndTextKzItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technical_equipments', function (Blueprint $table) {
            //
            $table->string('title_kz')->nullable()->after('text');
            $table->text('text_kz')->nullable()->after('title_kz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technical_equipments', function (Blueprint $table) {
            //
            $table->dropColumn(['title_kz', 'text_kz']);
        });
    }
}
