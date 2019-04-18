<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmlaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emlaks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sehir_id");
            $table->integer("category_id");
            $table->integer("agent_id");
           /* $table->integer("div_id");*/
            $table->string("cover_image")->nullable();
            $table->string("title");
            $table->string("description")->nullable();
            $table->text("content");
            $table->text("oz_title");
            $table->text("genel_oz");
            $table->string("slug");
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
        Schema::dropIfExists('emlaks');
    }
}
