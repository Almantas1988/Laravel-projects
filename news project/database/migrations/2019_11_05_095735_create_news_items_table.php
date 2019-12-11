<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_items', function (Blueprint $table) {

        	// struktura
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->string('main_image');

            // User id stulpelis tures foreign key su users lentele,
			// todel reikia priskirti unsigend atributa
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // sukuriame indexa user_id stulpeliui
            $table->index('user_id');

            // foreign key aprasymas
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_items');
    }
}
