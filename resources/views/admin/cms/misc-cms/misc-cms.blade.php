@extends('layouts.app')

@section('title', __('Misc. CMS'))

@section('content')
<!-- Content -->
    <!-- breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">{{ $cmsTranslations['misc_cms']->name }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">{{ $cmsTranslations['home']->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cmsTranslations['misc_cms']->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.misc-cms.store') }}">
        @csrf
        <div class="row g-lg-4 g-3">
            {{-- ======================= METAL TYPES ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['precious_metal_type']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="metalTypesContainer">
                            @foreach(old('metalTypes', $metalTypes ?? []) as $index => $item)
                            @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'metalTypes',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Metal Type',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= PRECIOUS COLORS ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['precious_color']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="colorsContainer">
                            @foreach(old('colors', $colors ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'colors',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Precious Color',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>        
            {{-- ======================= STAMPS ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['stamps']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="stampsContainer">
                            @foreach(old('stamps', $stamps ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'stamps',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Stamp',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= PC STATUS ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['pc_status']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="pcStatusContainer">
                            @foreach(old('statuses', $statuses ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'statuses',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter PC Status',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= jewelry Types ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['jewelry_type']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="jewelryTypesContainer">
                            @foreach(old('jewelryTypes', $jewelryTypes ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'jewelryTypes',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter jewelry Types',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= Comments ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['comments']->name }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="commentsContainer">
                            @foreach(old('comments', $comments ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'comments',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter comments',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= Comments ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['purpose_of_valuation']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="purposeOfValuationContainer">
                            @foreach(old('purposeOfValuations', $purposeOfValuations ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'purposeOfValuations',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Purpose Of Valuation',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['studded_stone']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="studdedStoneContainer">
                            @foreach(old('studdedStones', $studdedStones ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'studdedStones',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Studded Stone',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['unit']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="unitContainer">
                            @foreach(old('units', $units ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'units',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Unit',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- ======================= SHAPE ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['shape']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="shapesContainer">
                            @foreach(old('shapes', $shapes ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'shapes',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Shape',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= CUT GRADE ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['cut_grade']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="cutGradesContainer">
                            @foreach(old('cutGrades', $cutGrades ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'cutGrades',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Cut Grade',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= COLOR ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['color']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="gemColorsContainer">
                            @foreach(old('gemColors', $gemColors ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'gemColors',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Color',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= CLARITY ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['clarity']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="claritiesContainer">
                            @foreach(old('clarities', $clarities ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'clarities',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Clarity',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= GROUP ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['group']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="groupsContainer">
                            @foreach(old('groups', $groups ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'groups',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Group',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= TRANSPARENCY ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['transparency']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="transparenciesContainer">
                            @foreach(old('transparencies', $transparencies ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'transparencies',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Transparency',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= LUSTER ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['luster']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="lustersContainer">
                            @foreach(old('lusters', $lusters ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'lusters',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Luster',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= SPECIES ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['species']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="speciesContainer">
                            @foreach(old('species', $species ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'species',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Species',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= VARIETY ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['variety']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="varietiesContainer">
                            @foreach(old('varieties', $varieties ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'varieties',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Variety',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= FLUORESCENCE ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['fluorescence']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="fluorescencesContainer">
                            @foreach(old('fluorescences', $fluorescences ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'fluorescences',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Fluorescence',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= PHENOMENA ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['phenomena']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="phenomenasContainer">
                            @foreach(old('phenomenas', $phenomenas ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'phenomenas',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Phenomena',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= ESTIMATED ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['estimated']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="estimatedsContainer">
                            @foreach(old('estimateds', $estimateds ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'estimateds',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Estimated',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ======================= IDENTIFICATION ======================= --}}
            <div class="col-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <label class="form-label">{{ $cmsTranslations['identification']->name ?? '' }} <span class="text-danger">*</span></label>
                        <ul class="list-unstyled myList" id="identificationsContainer">
                            @foreach(old('identifications', $identifications ?? []) as $index => $item)
                                @include('admin.cms.misc-cms.dynamic-row', [
                                    'type' => 'identifications',
                                    'index' => $index,
                                    'id' => $item->id ?? '',
                                    'name' => $item->name ?? '',
                                    'placeholder' => 'Enter Identification',
                                ])
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="page-action mt-2">
                    <button type="submit" class="btn btn-big btn-primary">{{ $cmsTranslations['save']->name }}</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-big btn-secondary btn-cancel">{{ $cmsTranslations['cancel']->name }}</a>
                </div>
            </div>
        </div>
    </form>
<script>
document.addEventListener("DOMContentLoaded", () => {

    // FIX: Proper ID mapping for each section
    const containerMap = {
        metalTypes: "metalTypesContainer",
        colors: "colorsContainer",
        stamps: "stampsContainer",
        statuses: "pcStatusContainer",
        jewelryTypes:"jewelryTypesContainer",
        comments:"commentsContainer",
        purposeOfValuations:"purposeOfValuationContainer",
        studdedStones:"studdedStoneContainer",
        units:"unitContainer",
        shapes: "shapesContainer",
        cutGrades: "cutGradesContainer",
        gemColors: "gemColorsContainer",
        clarities: "claritiesContainer",
        groups: "groupsContainer",
        transparencies: "transparenciesContainer",
        lusters: "lustersContainer",
        species: "speciesContainer",
        varieties: "varietiesContainer",
        fluorescences: "fluorescencesContainer",
        phenomenas: "phenomenasContainer",
        estimateds: "estimatedsContainer",
        identifications: "identificationsContainer",
    };

    function createRow(type, index, idValue = "", nameValue = "", placeholder = "") {
        const row = document.createElement("div");
        row.classList.add(`${type}-row`);

        row.innerHTML = `
            <li class="align-items-center d-flex gap-2 mb-1">
                <input type="hidden" name="${type}[${index}][id]" value="${idValue}">
                <input class="form-control" type="text" 
                       name="${type}[${index}][name]" 
                       value="${nameValue}" 
                       placeholder="${placeholder}">
                <button type="button" class="btn p-0 delete-row remove-row" style="display:none;">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--bs-danger)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.688 14.6875L35.3119 35.3114"/>
                        <path d="M14.6885 35.3125L35.3124 14.6886"/>
                    </svg>
                </button>
                <button type="button" class="btn p-0 add-row btn-add">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M25 10.416V39.5827"/>
                        <path d="M10.4166 25H39.5833"/>
                    </svg>
                </button>
            </li>
        `;

        return row;
    }

    function registerDynamicSection(type, placeholder) {

        const container = document.getElementById(containerMap[type]);

        if (!container) return;

        // Default row if empty
        if (!container.querySelector(`.${type}-row`)) {
            container.appendChild(createRow(type, 0, '', '', placeholder));
        }

        function reindexRows() {
            const rows = container.querySelectorAll(`.${type}-row`);
            const total = rows.length;

            rows.forEach((row, i) => {

                // Update names
                let idInput = row.querySelector('input[type="hidden"]');
                let nameInput = row.querySelector('input[type="text"]');

                if (idInput) idInput.name = `${type}[${i}][id]`;
                if (nameInput) nameInput.name = `${type}[${i}][name]`;

                // Find buttons
                const removeBtn = row.querySelector('.remove-row');
                const addBtn = row.querySelector('.btn-add');

                // Show remove button only if more than 1 row
                if (total === 1) {
                    // Only 1 row → show only "+"
                    if (removeBtn) removeBtn.style.display = "none";
                    if (addBtn) addBtn.style.display = "inline-flex";
                } else {
                    if (i === total - 1) {
                        // LAST ROW → show "+" , hide "-"
                        if (addBtn) addBtn.style.display = "inline-flex";
                        if (removeBtn) removeBtn.style.display = "none";
                    } else {
                        // OTHER ROWS → show "-", hide "+"
                        if (addBtn) addBtn.style.display = "none";
                        if (removeBtn) removeBtn.style.display = "inline-flex";
                    }
                }
            });

            /** EXTRA FIX:
             * Remove any leftover .add buttons inside middle rows to avoid duplication
             */
            rows.forEach((row, i) => {
                if (i !== rows.length - 1) {
                    const wrongAddBtn = row.querySelector('.btn-add');
                    if (wrongAddBtn) wrongAddBtn.style.display = "none";
                }
            });
        }



        container.addEventListener("click", e => {

            if (e.target.closest('.btn-add')) {
                const rows = container.querySelectorAll(`.${type}-row`);
                container.appendChild(createRow(type, rows.length, '', '', placeholder));
                reindexRows();
            }

            if (e.target.closest('.remove-row')) {
                e.target.closest(`.${type}-row`).remove();

                if (!container.querySelector(`.${type}-row`)) {
                    container.appendChild(createRow(type, 0, '', '', placeholder));
                }

                reindexRows();
            }
        });

        reindexRows();
    }

    registerDynamicSection("metalTypes", "Enter Metal Type");
    registerDynamicSection("colors", "Enter Precious Color");
    registerDynamicSection("stamps", "Enter Stamp");
    registerDynamicSection("statuses", "Enter PC Status");
    registerDynamicSection("jewelryTypes", "Enter jewelry type");
    registerDynamicSection("comments", "Enter comments");
    registerDynamicSection("purposeOfValuations", "Enter Purpose Of Valuation");
    registerDynamicSection("studdedStones", "Enter Studded Stone");
    registerDynamicSection("units", "Enter Unit");

    registerDynamicSection("shapes", "Enter Shape");
    registerDynamicSection("cutGrades", "Enter Cut Grade");
    registerDynamicSection("gemColors", "Enter Color");
    registerDynamicSection("clarities", "Enter Clarity");
    registerDynamicSection("groups", "Enter Group");
    registerDynamicSection("transparencies", "Enter Transparency");
    registerDynamicSection("lusters", "Enter Luster");
    registerDynamicSection("species", "Enter Species");
    registerDynamicSection("varieties", "Enter Variety");
    registerDynamicSection("fluorescences", "Enter Fluorescence");
    registerDynamicSection("phenomenas", "Enter Phenomena");
    registerDynamicSection("estimateds", "Enter Estimated");
    registerDynamicSection("identifications", "Enter Identification");

});
</script>

@endsection
