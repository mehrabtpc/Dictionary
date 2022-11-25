<?php

namespace Modules\Dictionary\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Dictionary extends Model implements HasMedia
{
    use HasFactory,Sortable,InteractsWithMedia;

    protected $fillable = [
        'word','language','definition','translate','phonetic','short_definition',
        'example','origin','type','level','status',
    ];

    protected $sortable = [
        'word','language','definition','translate','phonetic','short_definition',
        'example','origin','type','level','status',
    ];

    const WORD_TYPES = 'noun,pronoun,verb,adjective,adverb,preposition,conjunction,interjection';
    const WORD_LEVELS = 'a1,a2,b1,b2,c1,c2';
    const ACCEPT_WORDS_MIMES = 'jpg,oog,mp3';

    const TYPE_NOUN = 'noun';
    const TYPE_PRONOUN = 'pronoun';
    const TYPE_VERB = 'verb';
    const TYPE_ADJECTIVE = 'adjective';
    const TYPE_ADVERB = 'adverb';
    const TYPE_PREPOSITION = 'preposition';
    const TYPE_CONJUNCTION = 'conjunction';
    const TYPE_INTERJECTION = 'interjection';

    const LEVEL_A1 = 'a1';
    const LEVEL_A2 = 'a2';
    const LEVEL_B1 = 'b1';
    const LEVEL_B2 = 'b2';
    const LEVEL_C1 = 'c1';
    const LEVEL_C2 = 'c2';

    public static function getWordTypesAttributes(): array
    {
        return [
            static::TYPE_NOUN,
            static::TYPE_PRONOUN,
            static::TYPE_VERB,
            static::TYPE_ADJECTIVE,
            static::TYPE_ADVERB,
            static::TYPE_PREPOSITION,
            static::TYPE_CONJUNCTION,
            static::TYPE_INTERJECTION,
        ];
    }

    public static function getWordLevelAttributes(): array
    {
        return [
            static::LEVEL_A1,
            static::LEVEL_A2,
            static::LEVEL_B1,
            static::LEVEL_B2,
            static::LEVEL_C1,
            static::LEVEL_C2,
        ];
    }

    public static function getWordLevelLabelAttributes($c): string
    {
        $m = [
            static::LEVEL_A1 => 'A1',
            static::LEVEL_A2 => 'A2',
            static::LEVEL_B1 => 'B1',
            static::LEVEL_B2 => 'B2',
            static::LEVEL_C1 => 'C1',
            static::LEVEL_C2 => 'C2',

        ];

        return $m[$c];
    }

    protected static function newFactory(): \Modules\Dictionary\Database\factories\DictionaryFactory
    {
        return \Modules\Dictionary\Database\factories\DictionaryFactory::new();
    }


    public function isDeletable(): bool
    {
        return true;
    }

    //start spatie media[audio]
    protected $with = ['media'];
    protected $hidden = ['media'];
    protected $appends = ['audio'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('audios')->singleFile();
    }

    public function getAudioAttribute(): ?string
    {
        $media = $this->getFirstMedia('audios');
        if (!$media) {
            return asset('dist/audio/default.mp3');
        }
        return $media->getUrl();
    }

    public function addAudio($audio): bool|\Spatie\MediaLibrary\MediaCollections\Models\Media
    {
        if (!$audio) {
            return false;
        }

        return $this->addMedia($audio)->toMediaCollection('audios');
    }


    public function uploadAudio(Request $request)
    {
        if ($request->hasFile('audio') && $request->file('audio')) {
            $this->addAudio($request->file('audio'));
        }
    }

    public function deleteAudio()
    {
        $this->media()->delete();
    }

    //end spatie media

    public function scopeSearchKeywords($query)
    {
        return $query->when($query,function ($q) {
            return $q->where('word','LIKE','%'.\request('word').'%');
        });
    }
}
