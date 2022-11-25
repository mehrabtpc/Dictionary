<?php

namespace Modules\Dictionary\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Dictionary\Entities\Dictionary;

class DictionaryController extends Controller
{

    public function index()
    {
        $dictionaries = Dictionary::query()->sortable()->SearchKeywords()->get();

        return view('dictionary::front.dictionary.index',compact('dictionaries'));
    }

    public function show()
    {
        if (request('word') == ''){
            return redirect()->back()
                ->with('error','Please Enter Word');
        }
        $dictionary = Dictionary::query()->SearchKeywords()->latest('id')->first();
        $translates = [];

        if (!$dictionary){
            abort(404);
        }
        if ($dictionary){
            $translates = json_decode($dictionary->translate);
        }

        return view('dictionary::front.dictionary.show',compact('dictionary','translates'));
    }
}
