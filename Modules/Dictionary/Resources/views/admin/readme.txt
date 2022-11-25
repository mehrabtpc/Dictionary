

    $table->id();
    $table->string('word');  =>  [input] +
    $table->string('language')->default('english');  null
    $table->text('definition');  [CkEditor] +
    $table->json('translate');   [input] +
    $table->string('phonetic');  [input] +
    $table->text('short_definition')->nullable(); [texteria] -
    $table->text('example')->nullable();  [texteria] -
    $table->text('origin');  [null]
    $table->enum('type',Dictionary::getWordTypesAttributes()); [select2] +
    $table->enum('level',Dictionary::getWordLevelAttributes()); [select2] +
    $table->boolean('status')->default(1);  [checkbox] +
    $table->timestamps();
    #audio

