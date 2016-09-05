<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('fragment_type_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('story_id')->references('id')->on('stories');
            $table->integer('fragment_type');
            $table->integer('order');
            $table->integer('fragment_status');
            $table->softDeletes();
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('fragments');
    }
}
