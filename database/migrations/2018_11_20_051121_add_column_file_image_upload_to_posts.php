<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFileImageUploadToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 不是要建立整個table,而是建立那個欄位就好
        Schema::table('posts', function(Blueprint $table){
            $table->string('img_upload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 不是要把整個table刪掉,而是刪掉那個欄位就好
        Schema::table('posts', function(Blueprint $table) {
          $table->dropColumn('img_upload');
        });
    }
}
