<?php

namespace Modules\Dictionary\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Modules\Dictionary\Entities\Dictionary;

class DictionaryFactory extends Factory
{

    protected $model = \Modules\Dictionary\Entities\Dictionary::class;

    public function definition()
    {
        return [
            'word' => $this->faker->word,
            'language' => 'english',
            'definition' => $this->faker->text,
            'translate' => json_encode([$this->faker->word()]),
            'phonetic' => $this->faker->word,
            'short_definition' => $this->faker->text,
            'example' => $this->faker->word,
            'type' => Arr::random(Dictionary::getWordTypesAttributes()),
            'level' => Arr::random(Dictionary::getWordLevelAttributes()),
            'status' => '1',
        ];
    }
}

