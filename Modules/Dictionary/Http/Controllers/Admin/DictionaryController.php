<?php

namespace Modules\Dictionary\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dictionary\Entities\Dictionary;
use Modules\Dictionary\Http\Requests\Admin\DictionaryStoreRequest;
use Modules\Dictionary\Http\Requests\Admin\DictionaryUpdateRequest;

class DictionaryController extends Controller
{

    public function index()
    {
        $dictionaries = Dictionary::query()->sortable()->SearchKeywords()->latest('id')->get();

        return view('dictionary::admin.dictionary.index',compact('dictionaries'));
    }


    public function create()
    {
        $types = Dictionary::getWordTypesAttributes();
        $levels = Dictionary::getWordLevelAttributes();

        return view('dictionary::admin.dictionary.create',compact('types','levels'));
    }


    public function store(DictionaryStoreRequest $request)
    {
        Dictionary::create($request->validated());

        return redirect()->route('panel-dictionaries.index')
            ->with('success','word created successfully');

    }


    public function show($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        return view('dictionary::admin.dictionary.show',compact('dictionary'));
    }


    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $types = Dictionary::getWordTypesAttributes();
        $levels = Dictionary::getWordLevelAttributes();
        $translates = json_decode($dictionary->translate);

        return view('dictionary::admin.dictionary.edit',compact('dictionary','types','levels','translates'));
    }


    public function update(DictionaryUpdateRequest $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $dictionary->update($request->validated());

        return redirect()->route('panel-dictionaries.index')
            ->with('success','word updated successfully');
    }

    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $dictionary->delete();

        return redirect()->route('panel-dictionaries.index')
            ->with('success','word deleted successfully');
    }

    public function multipleDelete(Request $request): \Illuminate\Http\JsonResponse
    {
        Dictionary::destroy(explode(",", $request->ids));

        return response()->json([
            'status' => true,
            'message' => "کلمات با موفقیت حذف شدند ",
        ]);

    }
}
