<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('addressLine1');
            $table->text('addressLine2');
            $table->text('addressLine3');
            $table->text('serviceTime1');
            $table->text('serviceTime2');
            $table->text('serviceTime3');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('moreInfo');
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
        Schema::dropIfExists('contactinfos');
    }
}
