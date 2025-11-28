<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\ServiceOrder;
use App\Models\GjpItemMetal;
use App\Models\GjpItemGemStone;
use App\Models\PreciousMetalType;
use App\Models\PreciousColor;
use App\Models\Stamp;
use App\Models\Shape;
use App\Models\CutGrade;
use App\Models\Color;
use App\Models\Clarity;
use App\Models\Group;
use App\Models\Transparency;
use App\Models\Luster;
use App\Models\Species;
use App\Models\Variety;
use App\Models\Fluorescence;
use App\Models\Phenomena;
use App\Models\Estimated;
use App\Models\Identification;
use App\Models\Comment;
use App\Models\Unit;
use App\Http\Requests\StoreTestRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::with('serviceOrder.client')->paginate(10);
        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        abort(403, 'Unauthorized action');
        $testId = $request->query('test_id');
        if (!$testId) {
            return redirect()->route('admin.tests.index')->with('error', 'Test not found');
        }
        $test = Test::find($testId);
        if (!$test) {
            return redirect()->route('admin.tests.index')->with('error', 'Test not found');
        }
        if($test->metals->count() > 0 || $test->gemStones->count() > 0) {
            return redirect()->route('admin.tests.index')->with('error', 'Already started test.');
        }
        
        $serviceOrder = ServiceOrder::with(['client', 'articles.images'])->findOrFail($test->service_order_id);
        if(!$serviceOrder) {
            return redirect()->route('admin.tests.index')->with('error', 'Service order not found.');
        }
        // Fetch all reference data for dropdowns
        $metalTypes = PreciousMetalType::all();
        $colors = PreciousColor::all();
        $stamps = Stamp::all();
        $shapes = Shape::all();
        $cutGrades = CutGrade::all();
        $gemColors = Color::all();
        $clarities = Clarity::all();
        $groups = Group::all();
        $transparencies = Transparency::all();
        $lusters = Luster::all();
        $species = Species::all();
        $varieties = Variety::all();
        $fluorescences = Fluorescence::all();
        $phenomena = Phenomena::all();
        $estimateds = Estimated::all();
        $identifications = Identification::all();
        $comments = Comment::all();
        $units = Unit::all();
        
        return view('admin.tests.create', compact(
            'serviceOrder',
            'metalTypes',
            'colors',
            'stamps',
            'shapes',
            'cutGrades',
            'gemColors',
            'clarities',
            'groups',
            'transparencies',
            'lusters',
            'species',
            'varieties',
            'fluorescences',
            'phenomena',
            'estimateds',
            'identifications',
            'comments',
            'test',
            'units'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        try {
            $validated = $request->validated();
            $test = Test::find($request->test_id);
            // Create metal records
            foreach ($validated['article'] as $article) {
                if (!empty($article['metals'])) {
                    foreach ($article['metals'] as $metal) {
                        GjpItemMetal::create([
                            'test_id' => $test->id,
                            'gjp_item_id' => $metal['gjp_item_id'],
                            'precious_metal_type_id' => $metal['precious_metal_type_id'],
                            'precious_color_id' => $metal['precious_color_id'],
                            'stamp_id' => $metal['stamp_id'],
                            'purity' => $metal['purity'] ?? null,
                            'metal_net_weight' => $metal['metal_net_weight'] ?? null,
                        ]);
                    }
                }
                
                // Create gem stone records
                if (!empty($article['gem_stones'])) {
                    foreach ($article['gem_stones'] as $gemStone) {
                        GjpItemGemStone::create([
                            'test_id' => $test->id,
                            'gjp_item_id' => $gemStone['gjp_item_id'],
                            'stone_type' => $gemStone['stone_type'] ?? null,
                            'number_of_stones' => $gemStone['number_of_stones'] ?? null,
                            'weight_per_stone' => $gemStone['weight_per_stone'] ?? null,
                            'total_weight' => $gemStone['total_weight'] ?? null,
                            'measurement' => $gemStone['measurement'] ?? null,
                            'plotting' => $gemStone['plotting'] ?? null,
                            'shape_id' => $gemStone['shape_id'] ?? null,
                            'cut_grade_id' => $gemStone['cut_grade_id'] ?? null,
                            'color_id' => $gemStone['color_id'] ?? null,
                            'clarity_id' => $gemStone['clarity_id'] ?? null,
                            'group_id' => $gemStone['group_id'] ?? null,
                            'transparency_id' => $gemStone['transparency_id'] ?? null,
                            'luster_id' => $gemStone['luster_id'] ?? null,
                            'species_id' => $gemStone['species_id'] ?? null,
                            'variety_id' => $gemStone['variety_id'] ?? null,
                            'fluorescence_id' => $gemStone['fluorescence_id'] ?? null,
                            'phenomena_id' => $gemStone['phenomena_id'] ?? null,
                            'estimated_id' => $gemStone['estimated_id'] ?? null,
                            'identification_id' => $gemStone['identification_id'] ?? null,
                            'comment_id' => $gemStone['comment_id'] ?? null,
                            'weight_stone_unit_id' => $gemStone['weight_stone_unit_id'] ?? null,
                            'total_weight_unit_id' => $gemStone['total_weight_unit_id'] ?? null,
                        ]);
                    }
                }
            }
            
            return redirect()->route('admin.tests.index')
                ->with('success', 'Test created successfully!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'An error occurred while creating the test. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::with(['serviceOrder.client', 'serviceOrder.articles.images', 'metals', 'gemStones'])->findOrFail($id);
        if (!$test) {
            return redirect()->route('admin.tests.index')->with('error', 'Test not found');
        }
        
        $serviceOrder = ServiceOrder::with(['client', 'articles.images'])->find($test->service_order_id);
        if(!$serviceOrder) {
            return redirect()->route('admin.tests.index')->with('error', 'Service order not found.');
        }
        return view('admin.tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test = Test::with(['serviceOrder.articles.images', 'metals', 'gemStones'])->findOrFail($id);
        if (!$test) {
            return redirect()->route('admin.tests.index')->with('error', 'Test not found');
        }
        
        $serviceOrder = ServiceOrder::with(['client', 'articles.images'])->find($test->service_order_id);
        if(!$serviceOrder) {
            return redirect()->route('admin.tests.index')->with('error', 'Service order not found.');
        }
        
        // Fetch all reference data for dropdowns
        $metalTypes = PreciousMetalType::all();
        $colors = PreciousColor::all();
        $stamps = Stamp::all();
        $shapes = Shape::all();
        $cutGrades = CutGrade::all();
        $gemColors = Color::all();
        $clarities = Clarity::all();
        $groups = Group::all();
        $transparencies = Transparency::all();
        $lusters = Luster::all();
        $species = Species::all();
        $varieties = Variety::all();
        $fluorescences = Fluorescence::all();
        $phenomena = Phenomena::all();
        $estimateds = Estimated::all();
        $identifications = Identification::all();
        $comments = Comment::all();
        $units = Unit::all();
        
        return view('admin.tests.edit', compact(
            'test',
            'metalTypes',
            'colors',
            'stamps',
            'shapes',
            'cutGrades',
            'gemColors',
            'clarities',
            'groups',
            'transparencies',
            'lusters',
            'species',
            'varieties',
            'fluorescences',
            'phenomena',
            'estimateds',
            'identifications',
            'comments',
            'units'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTestRequest $request, string $id)
    {
        try {
            $test = Test::findOrFail($id);
            $validated = $request->validated();

            $receivedMetalIds = [];
            $receivedGemIds = [];
            $receivedMetalgjpItemIds = [];
            $receivedGemgjpItemIds = [];

            foreach ($validated['article'] as $articleKey => $article) {

                if (!empty($article['metals'])) {
                    foreach ($article['metals'] as $metal) {
                        $receivedMetalgjpItemIds[] = $metal['gjp_item_id'];
                        if (!empty($metal['id'])) {
                            // UPDATE
                            $existingMetal = GjpItemMetal::find($metal['id']);
                            if ($existingMetal) {
                                $existingMetal->update([
                                    'gjp_item_id' => $metal['gjp_item_id'],
                                    'precious_metal_type_id' => $metal['precious_metal_type_id'],
                                    'precious_color_id' => $metal['precious_color_id'],
                                    'stamp_id' => $metal['stamp_id'],
                                    'purity' => $metal['purity'] ?? null,
                                    'metal_net_weight' => $metal['metal_net_weight'] ?? null,
                                ]);

                                $receivedMetalIds[] = $existingMetal->id;
                            }
                        } else {
                            // CREATE
                            $newMetal = GjpItemMetal::create([
                                'test_id' => $test->id,
                                'gjp_item_id' => $metal['gjp_item_id'],
                                'precious_metal_type_id' => $metal['precious_metal_type_id'],
                                'precious_color_id' => $metal['precious_color_id'],
                                'stamp_id' => $metal['stamp_id'],
                                'purity' => $metal['purity'] ?? null,
                                'metal_net_weight' => $metal['metal_net_weight'] ?? null,
                            ]);

                            $receivedMetalIds[] = $newMetal->id;
                        }
                    }
                }

                if (!empty($article['gem_stones'])) {
                    foreach ($article['gem_stones'] as $gIndex => $gemStone) {
                        $plottingPath = null;

                        if ($request->hasFile("article.$articleKey.gem_stones.$gIndex.plotting")) {
                            $file = $request->file("article.$articleKey.gem_stones.$gIndex.plotting");
                            $plottingPath = $file->store('plottings', 'public');
                        }
                        $receivedGemgjpItemIds[] = $metal['gjp_item_id'];
                        if (!empty($gemStone['id'])) {
                            // UPDATE
                            $existingGem = GjpItemGemStone::find($gemStone['id']);
                            if ($existingGem) {
                                $existingGem->update([
                                    'gjp_item_id' => $gemStone['gjp_item_id'],
                                    'stone_type' => $gemStone['stone_type'] ?? null,
                                    'number_of_stones' => $gemStone['number_of_stones'] ?? null,
                                    'weight_per_stone' => $gemStone['weight_per_stone'] ?? null,
                                    'total_weight' => $gemStone['total_weight'] ?? null,
                                    'measurement' => $gemStone['measurement'] ?? null,
                                    'plotting' => $plottingPath ?? null,
                                    'shape_id' => $gemStone['shape_id'] ?? null,
                                    'cut_grade_id' => $gemStone['cut_grade_id'] ?? null,
                                    'color_id' => $gemStone['color_id'] ?? null,
                                    'clarity_id' => $gemStone['clarity_id'] ?? null,
                                    'group_id' => $gemStone['group_id'] ?? null,
                                    'transparency_id' => $gemStone['transparency_id'] ?? null,
                                    'luster_id' => $gemStone['luster_id'] ?? null,
                                    'species_id' => $gemStone['species_id'] ?? null,
                                    'variety_id' => $gemStone['variety_id'] ?? null,
                                    'fluorescence_id' => $gemStone['fluorescence_id'] ?? null,
                                    'phenomena_id' => $gemStone['phenomena_id'] ?? null,
                                    'estimated_id' => $gemStone['estimated_id'] ?? null,
                                    'identification_id' => $gemStone['identification_id'] ?? null,
                                    'comment_id' => $gemStone['comment_id'] ?? null,
                                    'weight_stone_unit_id' => $gemStone['weight_stone_unit_id'] ?? null,
                                    'total_weight_unit_id' => $gemStone['total_weight_unit_id'] ?? null,
                                    'internal_comment' => $gemStone['internal_comment'] ?? null,
                                ]);

                                $receivedGemIds[] = $existingGem->id;
                            }
                        } else {
                            // CREATE
                            $newGem = GjpItemGemStone::create([
                                'test_id' => $test->id,
                                'gjp_item_id' => $gemStone['gjp_item_id'],
                                'stone_type' => $gemStone['stone_type'] ?? null,
                                'number_of_stones' => $gemStone['number_of_stones'] ?? null,
                                'weight_per_stone' => $gemStone['weight_per_stone'] ?? null,
                                'total_weight' => $gemStone['total_weight'] ?? null,
                                'measurement' => $gemStone['measurement'] ?? null,
                                'plotting' => $plottingPath ?? null,
                                'shape_id' => $gemStone['shape_id'] ?? null,
                                'cut_grade_id' => $gemStone['cut_grade_id'] ?? null,
                                'color_id' => $gemStone['color_id'] ?? null,
                                'clarity_id' => $gemStone['clarity_id'] ?? null,
                                'group_id' => $gemStone['group_id'] ?? null,
                                'transparency_id' => $gemStone['transparency_id'] ?? null,
                                'luster_id' => $gemStone['luster_id'] ?? null,
                                'species_id' => $gemStone['species_id'] ?? null,
                                'variety_id' => $gemStone['variety_id'] ?? null,
                                'fluorescence_id' => $gemStone['fluorescence_id'] ?? null,
                                'phenomena_id' => $gemStone['phenomena_id'] ?? null,
                                'estimated_id' => $gemStone['estimated_id'] ?? null,
                                'identification_id' => $gemStone['identification_id'] ?? null,
                                'comment_id' => $gemStone['comment_id'] ?? null,
                                'weight_stone_unit_id' => $gemStone['weight_stone_unit_id'] ?? null,
                                'total_weight_unit_id' => $gemStone['total_weight_unit_id'] ?? null,
                                'internal_comment' => $gemStone['internal_comment'] ?? null,
                            ]);

                            $receivedGemIds[] = $newGem->id;
                        }
                    }
                }
            }

            $test->gemStones()->whereIn('gjp_item_id', $receivedGemgjpItemIds)->whereNotIn('id', $receivedGemIds)->delete();
            $test->metals()->where('gjp_item_id', $receivedMetalgjpItemIds)->whereNotIn('id', $receivedMetalIds)->delete();

            return redirect()->route('admin.tests.index')->with('success', 'Test updated successfully');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::findOrFail($id);
        $test->metals()->forceDelete();
        $test->gemStones()->forceDelete();
        $test->delete();
        
        return redirect()->route('admin.tests.index')->with('success', 'Test deleted successfully');
    }
}
