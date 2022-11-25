<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Dictionary\Entities\Dictionary;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('language')->default('english');
            $table->text('definition');
            $table->json('translate');
            $table->string('phonetic');
            $table->text('short_definition')->nullable();
            $table->text('example')->nullable();
            $table->text('origin')->nullable();
            $table->enum('type',Dictionary::getWordTypesAttributes());
            $table->enum('level',Dictionary::getWordLevelAttributes());
            $table->boolean('status')->default(1);
            $table->timestamps();
            #audio
        });
    }

    public function down()
    {
        Schema::dropIfExists('dictionaries');
    }
};
