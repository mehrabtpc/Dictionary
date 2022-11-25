<?php

namespace Modules\Dictionary\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Dictionary\Entities\Dictionary;

class DictionaryController extends Controller
{
    public function index()
    {
        $dictionaries = Dictionary::query()->sortable()->SearchKeywords()->get();

        return response()->json([
            'message' => 'success',
            'data' => $dictionaries,
        ]);

    }

    public function show()
    {
        $dictionary = Dictionary::query()->SearchKeywords()->latest('id')->first();

        if (!$dictionary){
            abort(404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $dictionary,
        ]);
    }
}
