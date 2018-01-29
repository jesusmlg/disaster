<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('note');
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('visits')->default(0);
            $table->datetime('last_visit')->default(DB::raw('CURRENT_TIMESTAMP'));            
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
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign('notes_user_id_foreign');
        });

        Schema::dropIfExists('notes');
    }
}
