<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use App\Models\Client;
use App\Models\JewelryType;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    public function index()
    {
        $serviceOrders = ServiceOrder::with('client')->latest()->paginate(10);
        return view('admin.service_orders.index', compact('serviceOrders'));
    }

    public function create()
    {
        $clients = Client::all();
        $jewelryTypes = JewelryType::all();
        $studdedStones = [];

        return view('admin.service_orders.create', compact('clients', 'jewelryTypes', 'studdedStones'));
    }

    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());die;
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_type' => 'required|in:valuation,consultation',
            'purpose_id' => 'nullable|string',
            'delivery_date' => 'nullable|date',
            'comment' => 'nullable|string',

            // GJP Items validation
            'jewellery_type_id.*' => 'required|exists:jewelry_types,id',
            'total_weight.*' => 'nullable|string',
            'weight_unit.*' => 'nullable|string',
            'studded_stone_id.*' => 'required|exists:studded_stones,id',
            'comment.*' => 'nullable|string',
            'item_images.*.*' => 'nullable|image|max:2048', // multiple images
        ]);

        // Create Service Order
        $serviceOrder = ServiceOrder::create([
            'client_id' => $validated['client_id'],
            'service_type' => $validated['service_type'],
            'purpose_id' => $validated['purpose_id'] ?? null,
            'delivery_date' => $validated['delivery_date'] ?? null,
            'comment' => $validated['comment'] ?? null,
        ]);

        // Save each GJP item
        if ($request->has('jewellery_type_id')) {
            foreach ($request->jewellery_type_id as $key => $jewelryTypeId) {
                $gjpItem = GjpItem::create([
                    'service_order_id' => $serviceOrder->id,
                    'jewellery_type_id' => $jewelryTypeId,
                    'total_weight' => $request->total_weight[$key] ?? null,
                    'weight_unit' => $request->weight_unit[$key] ?? 'grams',
                    'studded_stone_id' => $request->studded_stone_id[$key],
                    'comment' => $request->comment[$key] ?? null,
                ]);

                // Handle multiple image uploads
                if ($request->hasFile("item_images.$key")) {
                    foreach ($request->file("item_images.$key") as $image) {
                        $path = $image->store('gjp_item_images', 'public');
                        $gjpItem->images()->create([
                            'image_path' => $path,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('service-order.create')->with('success', 'Service Order created successfully!');
    }

    public function show(ServiceOrder $serviceOrder)
    {
        return view('admin.service_orders.show', compact('serviceOrder'));
    }

    public function edit(ServiceOrder $serviceOrder)
    {
        $clients = Client::all();
        $purposes = [];
        return view('admin.service_orders.edit', compact('serviceOrder', 'clients', 'purposes'));
    }

    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_type' => 'required|in:valuation,consultation',
            'purpose_id' => 'nullable',
            'consultation' => 'nullable|string',
            'has_other_owners' => 'boolean',
            'how_many' => 'nullable|integer',
            'ownership_percentage' => 'nullable|string',
            'government_referral' => 'nullable|string',
            'other_use_of_report' => 'nullable|string',
            'delivery_date' => 'nullable|date',
            'comment' => 'nullable|string',
            'previous_valuation_report' => 'nullable|string',
        ]);
        $validated['is_submited'] = $request->has('is_submited');

        $serviceOrder->update($validated);

        return redirect()->route('service-orders.index')->with('success', 'Service Order updated successfully');
    }

    public function destroy(ServiceOrder $serviceOrder)
    {
        $serviceOrder->delete();
        return redirect()->route('service-orders.index')->with('success', 'Service Order deleted successfully');
    }
}
