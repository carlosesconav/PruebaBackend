<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{

    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('ref_api');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
