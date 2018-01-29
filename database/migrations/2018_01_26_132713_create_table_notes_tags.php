<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotesTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_tags', function (Blueprint $table) {            
            $table->integer('note_id');
            $table->integer('tag_id');
            
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->Unique(['note_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes_tags', function (Blueprint $table) {
            $table->dropForeign('notes_tags_note_id_foreign');
            $table->dropForeign('notes_tags_tag_id_foreign');
        });
    }
}
