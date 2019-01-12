<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageGalleriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('image', 255);
            $table->integer('download');
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_galleries');
    }
}
