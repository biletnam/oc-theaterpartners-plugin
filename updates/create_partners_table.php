<?php namespace Abnmt\TheaterPartners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePartnersTable extends Migration
{

    public function up()
    {
        Schema::create('abnmt_theaterpartners_partners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->string('slug')->index();
            $table->string('link')->nullable();
            $table->string('description')->nullable();

            $table->integer('category_id')->unsigned();
            $table->integer('sort_order')->nullable();

            $table->json('meta')->nullable()->default(null);

            $table->boolean('published')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abnmt_theaterpartners_partners');
    }

}
