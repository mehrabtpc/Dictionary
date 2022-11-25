<?php

namespace Modules\Dictionary\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Dictionary\Entities\Dictionary;

class DictionaryStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'word' => 'required|string|min:1|max:100',
            'language' => 'nullable|string',
            'definition' => 'required|string|min:1',
            'translate' => 'required|min:1',
            'phonetic' => 'required|string|min:1|max:100',
            'short_definition' => 'nullable|string|min:1',
            'example' => 'nullable|string|min:1',
            'origin' => 'nullable|string|min:1',
            'type' => 'required|in:'. Dictionary::WORD_TYPES,
            'level' => 'required|in:'. Dictionary::WORD_LEVELS,
            'status' => 'required|boolean',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status'),
        ]);
    }

    public function authorize()
    {
        return true;
    }
}
