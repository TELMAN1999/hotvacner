<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Article', function (Blueprint $table) {
            $table->id();;
            $table->string('email');;
            $table->string('Article_title')->nullable();;
            $table->text('Article')->nullable();;
            $table->text('Author')->nullable();;
            $table->year('Year')->nullable();
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
        Schema::dropIfExists('Article');
    }
}
