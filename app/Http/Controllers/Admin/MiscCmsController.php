<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MiscCmsDataRequest;
use App\Models\Clarity;
use App\Models\Color;
use App\Models\PreciousMetalType;
use App\Models\PreciousColor;
use App\Models\Stamp;
use App\Models\PcStatus;
use App\Models\JewelryType;
use App\Models\Comment;
use App\Models\CutGrade;
use App\Models\Estimated;
use App\Models\Fluorescence;
use App\Models\Group;
use App\Models\Identification;
use App\Models\Luster;
use App\Models\Phenomena;
use App\Models\PurposeOfValuation;
use App\Models\Shape;
use App\Models\Species;
use App\Models\StuddedStone;
use App\Models\Transparency;
use App\Models\Unit;
use App\Models\Variety;

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
        $purposeOfValuations = PurposeOfValuation::all();
        $studdedStones = StuddedStone::all();
        $units = Unit::all();

        // NEW MODELS
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
        $phenomenas = Phenomena::all();
        $estimateds = Estimated::all();
        $identifications = Identification::all();

        return view('admin.cms.misc-cms.misc-cms', compact(
            'metalTypes','colors','stamps','statuses','jewelryTypes','comments',
            'purposeOfValuations','studdedStones','units',

            // NEW MODELS
            'shapes','cutGrades','gemColors','clarities','groups','transparencies',
            'lusters','species','varieties','fluorescences','phenomenas','estimateds',
            'identifications'
        ));
    }

     private function processModel($modelClass, $validatedData, $key, $relations = [])
    {
        // dd($validatedData);
        $items = $validatedData[$key] ?? [];
        
        $ids = collect($items)->pluck('id')->filter()->toArray();

        // Convert single relation to array
        if (!is_array($relations)) {
            $relations = [$relations];
        }

        $toDelete = $modelClass::whereNotIn('id', $ids)->get();
        foreach ($toDelete as $item) {
            foreach ($relations as $relation) {

                // If relation method exists AND has linked items → stop deletion
                if (method_exists($item, $relation) && $item->{$relation}()->exists()) {
                    return "The {$key} '{$item->name}' cannot be deleted because it is currently in use.";
                }
            }
        }

        // 2️⃣ DELETE OLD UNUSED RECORDS
        $modelClass::whereNotIn('id', $ids)->delete();

        // 3️⃣ SAVE / UPDATE RECORDS
        foreach ($items as $row) {
            $modelClass::updateOrCreate(
                ['id' => $row['id'] ?? null],
                ['name' => $row['name'] ?? null]
            );
        }

        return null; // no errors
    }

    public function store(MiscCmsDataRequest $request)
    {
        $validated = $request->validated();

        // RUN ALL MODELS
        $errors = [

            // Old models
            $this->processModel(Color::class, $validated, 'gemColors', ['GjpItemGemStone']),
            $this->processModel(PreciousMetalType::class, $validated, 'metalTypes'),
            $this->processModel(PreciousColor::class, $validated, 'colors'),
            $this->processModel(Stamp::class, $validated, 'stamps'),
            $this->processModel(PcStatus::class, $validated, 'statuses'),

            $this->processModel(JewelryType::class, $validated, 'jewelryTypes', ['gjpItems']),
            $this->processModel(Comment::class, $validated, 'comments'),
            $this->processModel(PurposeOfValuation::class, $validated, 'purposeOfValuations', ['serviceOrder']),
            $this->processModel(StuddedStone::class, $validated, 'studdedStones', ['articles']),
            $this->processModel(Unit::class, $validated, 'units', ['articles']),

            // New models (all using articles relation — update as needed)
            $this->processModel(Shape::class, $validated, 'shapes', ['GjpItemGemStone']),
            $this->processModel(CutGrade::class, $validated, 'cutGrades', ['GjpItemGemStone']),
            $this->processModel(Clarity::class, $validated, 'clarities', ['GjpItemGemStone']),
            $this->processModel(Group::class, $validated, 'groups', ['GjpItemGemStone']),
            $this->processModel(Transparency::class, $validated, 'transparencies', ['GjpItemGemStone']),
            $this->processModel(Luster::class, $validated, 'lusters', ['GjpItemGemStone']),
            $this->processModel(Species::class, $validated, 'species', ['GjpItemGemStone']),
            $this->processModel(Variety::class, $validated, 'varieties', ['GjpItemGemStone']),
            $this->processModel(Fluorescence::class, $validated, 'fluorescences', ['GjpItemGemStone']),
            $this->processModel(Phenomena::class, $validated, 'phenomenas', ['GjpItemGemStone']),
            $this->processModel(Estimated::class, $validated, 'estimateds', ['GjpItemGemStone']),
            $this->processModel(Identification::class, $validated, 'identifications', ['GjpItemGemStone']),
        ];

        // Return first error if any
        foreach ($errors as $error) {
            if ($error) {
                return back()->with('error', $error);
            }
        }

        return back()->with('success', 'Misc CMS data saved successfully.');
    }
}

