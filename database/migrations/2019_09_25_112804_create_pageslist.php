<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageslist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pageslist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pagetitle');
            $table->string('articlelist');
            $table->string('tags');
            $table->string('status');
            $table->string('prebid');
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
        Schema::dropIfExists('pageslist');
    }
}
