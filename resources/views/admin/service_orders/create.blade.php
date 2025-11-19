<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Service Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.service-orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- ================= CLIENT SELECT & DETAILS ================= --}}
                        <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block mb-1 font-semibold">Choose a Client</label>
                                <div class="flex gap-2">
                                    <select id="clientSelect" name="client_id" class="w-full border rounded p-2">
                                        <option value="">-- Select Client --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->individual_name ?? $client->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('clients.create') }}" class="px-3 py-2 rounded bg-amber-500 text-white">Add Client</a>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label class="block mb-1 font-semibold">Client Summary</label>
                                <div id="clientSummary" class="border rounded p-4 bg-gray-50 min-h-[72px]">
                                    <div class="text-sm text-gray-600">Select a client to view details here.</div>
                                </div>
                            </div>
                        </div>

                        {{-- ================= SERVICE / VALUATION FIELDS ================= --}}
                        <div class="mb-6 border rounded p-4 bg-white">
                            <div class="flex items-center gap-3 mb-4">
                                <button type="button" id="tabValuation" class="px-4 py-2 rounded bg-amber-200">Valuation Service</button>
                                <button type="button" id="tabConsult" class="px-4 py-2 rounded bg-gray-100">Consultation Service</button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-1">Purpose of Valuation <span class="text-red-500">*</span></label>
                                    <select name="purpose_id" class="w-full border rounded p-2">
                                        <option value="">Select</option>
                                        @foreach($purposes ?? [] as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center gap-3">
                                    <label class="block mb-1">Is there any other owners?</label>
                                    <div class="flex items-center gap-2">
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="has_other_owners" value="0" checked> No
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="has_other_owners" value="1"> Yes
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-1">How Many?</label>
                                    <input type="number" name="how_many" class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="block mb-1">What is your percentage?</label>
                                    <input type="text" name="ownership_percentage" class="w-full border rounded p-2" placeholder="e.g. 50%">
                                </div>

                                <div>
                                    <label class="block mb-1">Any Government Referral?</label>
                                    <input type="text" name="government_referral" class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="block mb-1">Is there any other who will use the valuation report?</label>
                                    <input type="text" name="other_use_of_report" class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="block mb-1">Delivery Date</label>
                                    <input type="date" name="delivery_date" class="w-full border rounded p-2">
                                </div>

                                <div class="col-span-2">
                                    <label class="block mb-1">Comment</label>
                                    <textarea name="comment" rows="2" class="w-full border rounded p-2"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- ================= GJP SECTION (items will be appended here) ================= --}}
                        <h3 class="text-lg font-bold mb-2">Gemstones & Jewelry Pc# (GJP)</h3>

                        <div id="gjp-items-wrapper" class="space-y-4"></div>

                        <div class="mt-2">
                            <button type="button" id="add-gjp-item" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-100 rounded">
                                + Add New Article
                            </button>
                        </div>

                        {{-- ================= SUBMIT ================= --}}
                        <div class="mt-6">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-dark px-6 py-2 rounded">
                                Save Order
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- ================= TEMPLATES (single file contains all templates) ================= --}}
    <template id="gjp-item-template">
        <div class="gjp-item border p-4 rounded bg-gray-50 relative">
            <!-- cross button top-right -->
            <button type="button" class="absolute top-2 right-2 text-gray-700 text-2xl font-bold leading-none hover:text-red-600 remove-gjp-item">&times;</button>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block mb-1 font-semibold">Jewellery Type <span class="text-red-500">*</span></label>
                    <select name="jewellery_type_id[]" class="w-full border rounded p-2">
                        <option value="">Select</option>
                        @foreach($jewelryTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Total Weight <span class="text-red-500">*</span></label>
                    <input type="text" name="total_weight[]" class="w-full border rounded p-2" placeholder="Enter here">
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Weight Unit</label>
                    <select name="weight_unit[]" class="w-full border rounded p-2">
                        <option value="grams">Grams</option>
                        <option value="carats">Carats</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Studded Stones <span class="text-red-500">*</span></label>
                    <select name="studded_stone_id[]" class="w-full border rounded p-2">
                        <option value="">Select</option>
                        @foreach($studdedStones as $stone)
                            <option value="{{ $stone->id }}">{{ $stone->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- pictures area (start with one row) --}}
            <div class="mt-4">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-semibold">Pictures</h4>
                    <button type="button" class="text-amber-600 text-sm add-picture-row">+ Add New Picture</button>
                </div>

                <div class="picture-rows space-y-3">
                    <div class="picture-row flex gap-3 items-start">
                        <div class="w-1/3">
                            <input type="file" class="w-full border rounded p-2 picture-file" />
                        </div>
                        <div class="flex-1">
                            <input type="text" class="w-full border rounded p-2 picture-caption" placeholder="Enter here" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" class="picture-for-testing" /> For Testing
                            </label>
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" class="picture-for-valuation" /> For Valuation Report
                            </label>
                        </div>
                        <div>
                            <button type="button" class="text-red-600 remove-picture-row text-2xl leading-none">&times;</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- article-level fields --}}
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Article belongings such as Boxes / Bag / Guarantee card</label>
                    <input type="file" name="item_article_belonging_file[]" class="w-full border rounded p-2" />
                </div>

                <div>
                    <label class="block mb-1">Previous Valuation Report?</label>
                    <input type="file" name="item_previous_valuation_report[]" class="w-full border rounded p-2" />
                </div>

                <div>
                    <label class="block mb-1">Invoices related to the Article?</label>
                    <input type="file" name="item_invoice_file[]" class="w-full border rounded p-2" />
                </div>

                <div>
                    <label class="block mb-1">Attachment</label>
                    <input type="file" name="item_attachment_file[]" class="w-full border rounded p-2" />
                </div>

                <div class="col-span-2">
                    <label class="block mb-1">Comment</label>
                    <textarea name="item_comment[]" rows="2" class="w-full border rounded p-2"></textarea>
                </div>
            </div>
        </div>
    </template>

    {{-- ================= SCRIPTS ================= --}}
    <script>
        (function () {
            // --- configuration: where to fetch client JSON
            // expects GET /admin/clients/{id}/json returning JSON:
            // { individual_name, company_name, unified_number, mobile_number, email, created_at, employee_number }
            const clientFetchUrl = "{{ url('/admin/clients') }}"; // will call `${clientFetchUrl}/${id}/json`

            // DOM references
            const wrapper = document.getElementById('gjp-items-wrapper');
            const template = document.getElementById('gjp-item-template').content;
            const addGjpBtn = document.getElementById('add-gjp-item');
            const clientSelect = document.getElementById('clientSelect');
            const clientSummary = document.getElementById('clientSummary');

            // We'll track item index so nested image inputs can be named item_images[index][]
            let itemIndex = 0;

            // helper: create one gjp item and wire internal picture add/remove
            function createGjpItem() {
                const node = template.cloneNode(true);
                const root = node.querySelector('.gjp-item');

                // set names for file inputs inside this item to item_images[itemIndex][]
                // picture rows inside will be updated whenever add/remove picture occurs
                // set a data-index so we can reference it later
                root.dataset.index = itemIndex;

                // set name attributes for item-level file inputs so they can be grouped per item
                // these arrays are also created as item_article_belonging_file[], etc. controller can map by index
                root.querySelectorAll('[name="item_article_belonging_file[]"]').forEach(el => {
                    el.name = `item_article_belonging_file[${itemIndex}]`;
                });
                root.querySelectorAll('[name="item_previous_valuation_report[]"]').forEach(el => {
                    el.name = `item_previous_valuation_report[${itemIndex}]`;
                });
                root.querySelectorAll('[name="item_invoice_file[]"]').forEach(el => {
                    el.name = `item_invoice_file[${itemIndex}]`;
                });
                root.querySelectorAll('[name="item_attachment_file[]"]').forEach(el => {
                    el.name = `item_attachment_file[${itemIndex}]`;
                });
                root.querySelectorAll('[name="item_comment[]"]').forEach(el => {
                    el.name = `item_comment[${itemIndex}]`;
                });

                // For picture rows: update the existing first row inputs' names
                updatePictureRowNames(root, itemIndex);

                // attach add-picture handler
                root.querySelectorAll('.add-picture-row').forEach(btn => {
                    btn.addEventListener('click', function () {
                        addPictureRow(root, itemIndex);
                    });
                });

                // attach remove-gjp handler (delegated below) - button exists inside root
                wrapper.appendChild(node);
                itemIndex++;
            }

            // update names of picture-row inputs in the root for a given index (for the first/initial row)
            function updatePictureRowNames(root, index) {
                root.querySelectorAll('.picture-row').forEach(row => {
                    const fileInput = row.querySelector('.picture-file');
                    const captionInput = row.querySelector('.picture-caption');
                    const testingCheckbox = row.querySelector('.picture-for-testing');
                    const valuationCheckbox = row.querySelector('.picture-for-valuation');

                    if (fileInput) fileInput.name = `item_images[${index}][]`;
                    if (captionInput) captionInput.name = `item_image_captions[${index}][]`;
                    if (testingCheckbox) testingCheckbox.name = `item_image_for_testing[${index}][]`;
                    if (valuationCheckbox) valuationCheckbox.name = `item_image_for_valuation[${index}][]`;
                });
            }

            // add picture row inside a GJP item root
            function addPictureRow(root, index) {
                const container = root.querySelector('.picture-rows');
                if (!container) return;

                const row = document.createElement('div');
                row.className = 'picture-row flex gap-3 items-start';
                row.innerHTML = `
                    <div class="w-1/3">
                        <input type="file" class="w-full border rounded p-2 picture-file" name="item_images[${index}][]" />
                    </div>
                    <div class="flex-1">
                        <input type="text" class="w-full border rounded p-2 picture-caption" name="item_image_captions[${index}][]" placeholder="Enter here" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="item_image_for_testing[${index}][]" value="1" /> For Testing
                        </label>
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="item_image_for_valuation[${index}][]" value="1" /> For valuation Report
                        </label>
                    </div>
                    <div>
                        <button type="button" class="text-red-600 remove-picture-row text-2xl leading-none">&times;</button>
                    </div>
                `;
                container.appendChild(row);
            }

            // remove picture row (delegated)
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-picture-row')) {
                    const row = e.target.closest('.picture-row');
                    if (row) row.remove();
                }

                // remove whole gjp item
                if (e.target.classList.contains('remove-gjp-item')) {
                    const item = e.target.closest('.gjp-item');
                    if (item) item.remove();
                }
            });

            // add new GJP item when button clicked
            addGjpBtn.addEventListener('click', createGjpItem);

            // auto-add one item on load
            window.addEventListener('DOMContentLoaded', function () {
                createGjpItem();
            });

            // ----------------- Client auto-fill -----------------
            clientSelect.addEventListener('change', function () {
                const id = this.value;
                if (!id) {
                    clientSummary.innerHTML = '<div class="text-sm text-gray-600">Select a client to view details here.</div>';
                    return;
                }

                // fetch client JSON from /admin/clients/{id}/json
                fetch(`${clientFetchUrl}/${id}/json`, {
                    headers: { 'Accept': 'application/json' },
                })
                    .then(resp => {
                        if (!resp.ok) throw new Error('Client fetch failed');
                        return resp.json();
                    })
                    .then(data => {
                        const name = data.individual_name || data.company_name || '-';
                        const unified = data.unified_number || data.national_id || '-';
                        const mobile = data.mobile_number || data.mobile_phone || '-';
                        const email = data.individual_email || data.email || '-';
                        const date = data.created_at ? new Date(data.created_at).toLocaleString() : '-';
                        const emp = data.employee_number || '-';

                        clientSummary.innerHTML = `
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <div class="text-xs text-gray-500">Client Name</div>
                                    <div class="font-medium">${escapeHtml(name)}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Client Number</div>
                                    <div class="font-medium">${escapeHtml(unified)}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Mobile Number</div>
                                    <div class="font-medium">${escapeHtml(mobile)}</div>
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">Email Address</div>
                                    <div class="font-medium">${escapeHtml(email)}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Date / Time</div>
                                    <div class="font-medium">${escapeHtml(date)}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Employee Number</div>
                                    <div class="font-medium">${escapeHtml(emp)}</div>
                                </div>
                            </div>
                        `;
                    })
                    .catch(() => {
                        clientSummary.innerHTML = '<div class="text-sm text-red-500">Could not fetch client details.</div>';
                    });
            });

            // small helper to escape inserted strings
            function escapeHtml(str) {
                if (!str) return '';
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }
        })();
    </script>
</x-app-layout>
