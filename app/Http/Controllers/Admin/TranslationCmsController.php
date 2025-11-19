<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TranslationCms;
use Illuminate\Http\Request;

class TranslationCmsController extends Controller
{
    public function index()
    {
        $translations = TranslationCms::orderBy('id')->get();
        return view('admin.cms.translation-cms', compact('translations'));
    }

    public function store(Request $request)
    {
        foreach ($request->translations as $item) {
            TranslationCms::where('id', $item['id'])->update([
                'name_en' => $item['name_en'],
                'name_ar' => $item['name_ar'],
            ]);
        }

        return redirect()->back()->with('success', 'Translations updated successfully.');
    }
}
