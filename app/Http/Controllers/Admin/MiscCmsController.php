<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MiscCmsDataRequest;
use App\Models\PreciousMetalType;
use App\Models\PreciousColor;
use App\Models\Stamp;
use App\Models\PcStatus;
use App\Models\JewelryType;
use App\Models\Comment;

class MiscCmsController extends Controller
{
    public function index()
    {
        $metalTypes = PreciousMetalType::all();
        $colors = PreciousColor::all();
        $stamps = Stamp::all();
        $statuses = PcStatus::all();
        $jewelryTypes = JewelryType::all();
        $comments = Comment::all();
        return view('admin.cms.misc-cms',compact('metalTypes','colors','stamps','statuses','jewelryTypes','comments'));
    }

    public function store(MiscCmsDataRequest $request)
    {
        $validated = $request->validated();

        // Multiple Precious Metal Type
            $metalTypesIds = collect($validated['metalTypes'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            PreciousMetalType::whereNotIn('id', $metalTypesIds)->delete();
            foreach (($validated['metalTypes'] ?? []) as $result) {
                PreciousMetalType::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }
        
        // Multiple Precious Color
            $colorsIds = collect($validated['colors'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            PreciousColor::whereNotIn('id', $colorsIds)->delete();
            foreach (($validated['colors'] ?? []) as $result) {
                PreciousColor::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }

        // Multiple Stamp
            $stampsIds = collect($validated['stamps'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            Stamp::whereNotIn('id', $stampsIds)->delete();
            foreach (($validated['stamps'] ?? []) as $result) {
                Stamp::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }
        
        // Multiple Pc Status
            $statusesIds = collect($validated['statuses'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            PcStatus::whereNotIn('id', $statusesIds)->delete();
            foreach (($validated['statuses'] ?? []) as $result) {
                PcStatus::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }

        // Multiple Jewelry Type
            $jewelryTypesIds = collect($validated['jewelryTypes'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            JewelryType::whereNotIn('id', $jewelryTypesIds)->delete();
            foreach (($validated['jewelryTypes'] ?? []) as $result) {
                JewelryType::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }

        // Multiple Comment
            $commentsIds = collect($validated['comments'] ?? [])->pluck('id')->filter()->toArray();

            // Delete old ones not in request
            Comment::whereNotIn('id', $commentsIds)->delete();
            foreach (($validated['comments'] ?? []) as $result) {
                Comment::updateOrCreate(
                    ['id' => $result['id'] ?? null], // update if id exists, create if not
                    [
                        'name' => $result['name'] ?? null,
                    ]
                );
            }
        return back()->with('success', 'Data saved');
    }
}

