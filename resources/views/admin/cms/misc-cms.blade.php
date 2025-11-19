<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mics CMS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row g-3">
                        <form method="POST" action="{{ route('admin.misc-cms.store') }}">
                            @csrf
                            <div class="col-12 mb-md-3">
                                <div class="form-control-box">
                                    <label for="ProductTypes" class="form-label">Precious Metal Type <span class="text-danger">*</span></label>
                                    <div id="metalTypesContainer">
                                        @foreach(old('metalTypes', $metalTypes ?? []) as $index => $item)
                                            <div class="row g-3 align-items-center metalTypes-row">
                                                <div class="col-md-10 col-10">
                                                    <input type="hidden" name="metalTypes[{{ $index }}][id]" value="{{ old("metalTypes.$index.id", $item->id ?? '') }}">
                                                    <input class="form-control" type="text" name="metalTypes[{{ $index }}][name]" value="{{ old("metalTypes.$index.name", $item->name ?? '') }}" placeholder="Enter Metal Type">
                                                </div>
                                                <!-- Buttons -->
                                                <div class="col-md-1 col-1 align-self-end text-center btn-container remove">
                                                    @if(count(old('metalTypes', $metalTypes ?? [ [] ])) > 1)
                                                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                                <div class="col-md-1 col-1 align-self-end text-center btn-container add">
                                                    @if($loop->last)
                                                        <button type="button" class="btn-add border-0 p-0 bg-transparent">
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                                <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                                                <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            @error('metalTypes.' . $index . '.name')<div class="text-danger">{{ $message }}</div>@enderror
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-md-3">
                                <div class="form-control-box">
                                    <label for="ProductTypes" class="form-label">Precious Color <span class="text-danger">*</span></label>
                                    <div id="colorsContainer">
                                        @foreach(old('colors', $colors ?? []) as $index => $item)
                                            <div class="row g-3 align-items-center colors-row">
                                                <div class="col-md-10 col-10">
                                                    <input type="hidden" name="colors[{{ $index }}][id]" value="{{ old("colors.$index.id", $item->id ?? '') }}">
                                                    <input class="form-control" type="text" name="colors[{{ $index }}][name]" value="{{ old("colors.$index.name", $item->name ?? '') }}" placeholder="Enter Precious Color">
                                                </div>
                                                <!-- Buttons -->
                                                <div class="col-md-1 col-1 align-self-end text-center btn-container remove">
                                                    @if(count(old('colors', $colors ?? [ [] ])) > 1)
                                                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                                <div class="col-md-1 col-1 align-self-end text-center btn-container add">
                                                    @if($loop->last)
                                                        <button type="button" class="btn-add border-0 p-0 bg-transparent">
                                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                                <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                                                <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            @error('colors.' . $index . '.name')<div class="text-danger">{{ $message }}</div>@enderror
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // metalTypes
            const metalTypesContainer = document.getElementById('metalTypesContainer');

            function createmetalTypesRow(index, idValue = "", nameValue = "") {
                const row = document.createElement('div');
                row.classList.add('row', 'g-3', 'align-items-center', 'metalTypes-row');
                row.innerHTML = `
                    <div class="col-md-10 col-10">
                        <input type="hidden" name="metalTypes[${index}][id]" value="${idValue}">
                        <input class="form-control" type="text" 
                            name="metalTypes[${index}][name]" 
                            value="${nameValue}" 
                            placeholder="Enter Metal Type">
                    </div>

                    <!-- Remove button -->
                    <div class="col-md-1 col-1 text-center btn-container remove">
                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Add button -->
                    <div class="col-md-1 col-1 text-center btn-container add">
                        <button type="button" class="btn-add border-0 p-0 bg-transparent">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                `;
                return row;
            }

            function reindexmetalTypesRows() {
                const rows = metalTypesContainer.querySelectorAll('.metalTypes-row');

                rows.forEach((row, i) => {
                    // hidden input
                    const hidden = row.querySelector('input[type="hidden"]');
                    if (hidden) hidden.name = `metalTypes[${i}][id]`;

                    // text input
                    const text = row.querySelector('input[type="text"]');
                    if (text) text.name = `metalTypes[${i}][name]`;
                });

                // show remove only if >1 row
                rows.forEach(row => {
                    const removeBtn = row.querySelector('.remove-row');
                    if (removeBtn) {
                        removeBtn.style.display = rows.length > 1 ? "inline-flex" : "none";
                    }
                });

                // ensure only last row has add button
                rows.forEach((row, i) => {
                    const addBtn = row.querySelector('.btn-add');
                    if (addBtn) addBtn.style.display = (i === rows.length - 1) ? "inline-flex" : "none";
                });
            }

            // Init with one row if empty
            if (!metalTypesContainer.querySelector('.metalTypes-row')) {
                metalTypesContainer.appendChild(createmetalTypesRow(0));
            }

            metalTypesContainer.addEventListener('click', function (e) {
                // --- ADD NEW ROW ---
                if (e.target.closest('.btn-add')) {
                    const rows = metalTypesContainer.querySelectorAll('.metalTypes-row');
                    const newRow = createmetalTypesRow(rows.length);
                    // newRow.classList.add("mt-1");
                    metalTypesContainer.appendChild(newRow);

                    reindexmetalTypesRows();

                    // remove add button from all but last row
                    const allRows = metalTypesContainer.querySelectorAll('.metalTypes-row');
                    allRows.forEach((r, i) => {
                        const addBtn = r.querySelector('.btn-add');
                        if (addBtn && i !== allRows.length - 1) {
                            addBtn.remove();
                        }
                    });

                    // show remove buttons if more than 1 row
                    if (allRows.length > 1) {
                        allRows.forEach(r => {
                            let removeBtn = r.querySelector('.remove-row');
                            if (!removeBtn) {
                                const removeContainer = r.querySelector('.btn-container.remove');
                                if (removeContainer) {
                                    removeContainer.innerHTML = `
                                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    `;
                                }
                            }
                        });
                    }
                }

                // --- REMOVE ROW ---
                if (e.target.closest('.remove-row')) {
                    const row = e.target.closest('.metalTypes-row');
                    row.remove();

                    reindexmetalTypesRows();

                    let rows = metalTypesContainer.querySelectorAll('.metalTypes-row');

                    // ensure at least one row exists
                    if (rows.length === 0) {
                        metalTypesContainer.appendChild(createmetalTypesRow(0));
                        rows = metalTypesContainer.querySelectorAll('.metalTypes-row');
                    }

                    // remove add button from all but last row
                    rows.forEach((r, i) => {
                        const addBtn = r.querySelector('.btn-add');
                        if (addBtn && i !== rows.length - 1) {
                            addBtn.remove();
                        }
                    });

                    // make sure last row has Add button
                    const lastRow = rows[rows.length - 1];
                    if (lastRow && !lastRow.querySelector('.btn-add')) {
                        const addContainer = lastRow.querySelector('.btn-container.add');
                        if (addContainer) {
                            addContainer.innerHTML = `
                                <button type="button" class="btn-add border-0 p-0 bg-transparent">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            `;
                        }
                    }

                    // hide remove button if only one row left
                    if (rows.length === 1) {
                        const onlyRowRemove = rows[0].querySelector('.remove-row');
                        if (onlyRowRemove) onlyRowRemove.remove();
                    }
                }
            });

            reindexmetalTypesRows();
        
        // colors
            const colorsContainer = document.getElementById('colorsContainer');

            function createcolorsRow(index, idValue = "", nameValue = "") {
                const row = document.createElement('div');
                row.classList.add('row', 'g-3', 'align-items-center', 'colors-row');
                row.innerHTML = `
                    <div class="col-md-10 col-10">
                        <input type="hidden" name="colors[${index}][id]" value="${idValue}">
                        <input class="form-control" type="text" 
                            name="colors[${index}][name]" 
                            value="${nameValue}" 
                            placeholder="Enter Metal Type">
                    </div>

                    <!-- Remove button -->
                    <div class="col-md-1 col-1 text-center btn-container remove">
                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Add button -->
                    <div class="col-md-1 col-1 text-center btn-container add">
                        <button type="button" class="btn-add border-0 p-0 bg-transparent">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                `;
                return row;
            }

            function reindexcolorsRows() {
                const rows = colorsContainer.querySelectorAll('.colors-row');

                rows.forEach((row, i) => {
                    // hidden input
                    const hidden = row.querySelector('input[type="hidden"]');
                    if (hidden) hidden.name = `colors[${i}][id]`;

                    // text input
                    const text = row.querySelector('input[type="text"]');
                    if (text) text.name = `colors[${i}][name]`;
                });

                // show remove only if >1 row
                rows.forEach(row => {
                    const removeBtn = row.querySelector('.remove-row');
                    if (removeBtn) {
                        removeBtn.style.display = rows.length > 1 ? "inline-flex" : "none";
                    }
                });

                // ensure only last row has add button
                rows.forEach((row, i) => {
                    const addBtn = row.querySelector('.btn-add');
                    if (addBtn) addBtn.style.display = (i === rows.length - 1) ? "inline-flex" : "none";
                });
            }

            // Init with one row if empty
            if (!colorsContainer.querySelector('.colors-row')) {
                colorsContainer.appendChild(createcolorsRow(0));
            }

            colorsContainer.addEventListener('click', function (e) {
                // --- ADD NEW ROW ---
                if (e.target.closest('.btn-add')) {
                    const rows = colorsContainer.querySelectorAll('.colors-row');
                    const newRow = createcolorsRow(rows.length);
                    // newRow.classList.add("mt-1");
                    colorsContainer.appendChild(newRow);

                    reindexcolorsRows();

                    // remove add button from all but last row
                    const allRows = colorsContainer.querySelectorAll('.colors-row');
                    allRows.forEach((r, i) => {
                        const addBtn = r.querySelector('.btn-add');
                        if (addBtn && i !== allRows.length - 1) {
                            addBtn.remove();
                        }
                    });

                    // show remove buttons if more than 1 row
                    if (allRows.length > 1) {
                        allRows.forEach(r => {
                            let removeBtn = r.querySelector('.remove-row');
                            if (!removeBtn) {
                                const removeContainer = r.querySelector('.btn-container.remove');
                                if (removeContainer) {
                                    removeContainer.innerHTML = `
                                        <button type="button" class="remove-row border-0 p-0 bg-transparent">
                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                                <path d="M10.4167 25H39.5833" stroke="red" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    `;
                                }
                            }
                        });
                    }
                }

                // --- REMOVE ROW ---
                if (e.target.closest('.remove-row')) {
                    const row = e.target.closest('.colors-row');
                    row.remove();

                    reindexcolorsRows();

                    let rows = colorsContainer.querySelectorAll('.colors-row');

                    // ensure at least one row exists
                    if (rows.length === 0) {
                        colorsContainer.appendChild(createcolorsRow(0));
                        rows = colorsContainer.querySelectorAll('.colors-row');
                    }

                    // remove add button from all but last row
                    rows.forEach((r, i) => {
                        const addBtn = r.querySelector('.btn-add');
                        if (addBtn && i !== rows.length - 1) {
                            addBtn.remove();
                        }
                    });

                    // make sure last row has Add button
                    const lastRow = rows[rows.length - 1];
                    if (lastRow && !lastRow.querySelector('.btn-add')) {
                        const addContainer = lastRow.querySelector('.btn-container.add');
                        if (addContainer) {
                            addContainer.innerHTML = `
                                <button type="button" class="btn-add border-0 p-0 bg-transparent">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path d="M25 10.416V39.5827" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M10.4167 25H39.5833" stroke="#4FBCC1" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            `;
                        }
                    }

                    // hide remove button if only one row left
                    if (rows.length === 1) {
                        const onlyRowRemove = rows[0].querySelector('.remove-row');
                        if (onlyRowRemove) onlyRowRemove.remove();
                    }
                }
            });

            reindexcolorsRows();
    })
</script>