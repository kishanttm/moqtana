<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrderRequest;
use App\Models\ServiceOrder;
use App\Models\Client;
use App\Models\ContractCms;
use App\Models\GjpItem;
use App\Models\GjpItemImage;
use App\Models\JewelryType;
use App\Models\PurposeOfValuation;
use App\Models\StuddedStone;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the service orders.
     */
    public function index()
    {
        $serviceOrders = ServiceOrder::with('client');
        if (auth()->user()->hasRole('user')) {
            $serviceOrders = $serviceOrders->where('created_by', auth()->user()->id);
        }
        $serviceOrders = $serviceOrders->latest()
            ->paginate(10);
        return view('admin.service_orders.index', compact('serviceOrders'));
    }

    /**
     * Show the form for creating a new service order.
     */
    public function create()
    {
        $clients = Client::all();
        $jewelryTypes = JewelryType::all();
        $purposeOfValuations = PurposeOfValuation::all();
        $studdedStones = StuddedStone::all();
        $units = Unit::all();
        $articles = [];
        $order = null;
        
        return view('admin.service_orders.create', compact('clients', 'jewelryTypes', 'studdedStones', 'articles', 'order', 'purposeOfValuations', 'units'));
    }

    /**
     * Store a newly created service order in storage.
     */
    public function store(ServiceOrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $serviceOrderNumber = "";
            $orderId = "";

            do {
                $serviceOrderNumber = 'SO' . rand(10000, 99999);
            } while (ServiceOrder::where('service_order_number', $serviceOrderNumber)->exists());

            do {
                $orderId = 'ID' . rand(10000, 99999);
            } while (ServiceOrder::where('order_id', $orderId)->exists());

            // Create Service Order
            $serviceOrder = ServiceOrder::create([
                'client_id' => $request->client_id,
                'service_type' => $request->service_type,
                'purpose_id' => $request->purpose ?? null,
                'consultation' => $request->consultation ?? null,
                'has_other_owners' => $request->has_other_owners ?? false,
                'how_many' => $request->how_many ?? null,
                'ownership_percentage' => $request->ownership_percentage ?? null,
                'government_referral' => $request->government_referral ?? null,
                'other_use_of_report' => $request->other_use_of_report ?? null,
                'delivery_date' => $request->delivery_date ?? null,
                'comment' => $request->comment ?? null,
                'created_by' => auth()->user()->id ?? null,
                'service_order_number' => $serviceOrderNumber,
                'order_id' => $orderId,
                'status' => 'pending'
            ]);

            // Process articles (GJP Items)
            if ($request->has('articles') && is_array($request->articles)) {
                foreach ($request->articles as $articleIndex => $articleData) {
                    // Skip empty articles
                    if (empty($articleData['jewellery_type_id']) && empty($articleData['total_weight'])) {
                        continue;
                    }

                    // Create GJP Item
                    $gjpItem = GjpItem::create([
                        'service_order_id' => $serviceOrder->id,
                        'jewellery_type_id' => $articleData['jewellery_type_id'] ?? null,
                        'total_weight' => $articleData['total_weight'] ?? null,
                        'weight_unit_id' => $articleData['weight_unit'] ?? null,
                        'studded_stone_id' => $articleData['studded_stone_id'] ?? null,
                        'comment' => $articleData['comment'] ?? null,
                        'article_belonging_file' => null,
                        'previous_valuation_report' => null,
                        'invoice_file' => null,
                        'attachment_file' => null,
                    ]);

                    // Handle article-level file uploads
                    if ($request->hasFile("articles.$articleIndex.article_belonging_file")) {
                        $path = $request->file("articles.$articleIndex.article_belonging_file")
                            ->store('service_orders/articles', 'public');
                        $gjpItem->update(['article_belonging_file' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.previous_valuation_report")) {
                        $path = $request->file("articles.$articleIndex.previous_valuation_report")
                            ->store('service_orders/valuations', 'public');
                        $gjpItem->update(['previous_valuation_report' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.invoice_file")) {
                        $path = $request->file("articles.$articleIndex.invoice_file")
                            ->store('service_orders/invoices', 'public');
                        $gjpItem->update(['invoice_file' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.attachment_file")) {
                        $path = $request->file("articles.$articleIndex.attachment_file")
                            ->store('service_orders/attachments', 'public');
                        $gjpItem->update(['attachment_file' => $path]);
                    }

                    // Handle pictures for this article
                    if (isset($articleData['images']) && is_array($articleData['images'])) {
                        foreach ($articleData['images'] as $picIndex => $imageData) {
                            if (is_array($imageData)) {
                                // New image upload
                                if ($request->hasFile("articles.$articleIndex.images.$picIndex.file")) {
                                    $picturePath = $request->file("articles.$articleIndex.images.$picIndex.file")
                                        ->store('service_orders/pictures', 'public');
                                    
                                    GjpItemImage::create([
                                        'gjp_item_id' => $gjpItem->id,
                                        'image_path' => $picturePath,
                                        'name' => $imageData['name'] ?? null,
                                        'for_testing' => isset($imageData['for_testing']) ? 1 : 0,
                                        'for_valuation_report' => isset($imageData['for_valuation_report']) ? 1 : 0,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();
            
            return redirect()
                ->route('admin.service-orders.index')
                ->with('success', 'Service Order created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error creating service order: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified service order.
     */
    public function show(ServiceOrder $serviceOrder)
    {
        if (auth()->user()->hasRole('user') && $serviceOrder->created_by != auth()->user()->id) {
            abort(403, 'Unauthorized action');
        }
        $serviceOrder->load(['client', 'creator', 'articles.images']);
        
        return view('admin.service_orders.show', compact('serviceOrder'));
    }

    /**
     * Show the form for editing the specified service order.
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        if (auth()->user()->hasRole('user') && $serviceOrder->created_by != auth()->user()->id) {
            abort(403, 'Unauthorized action');
        }
        $serviceOrder->load('articles.images');
        $clients = Client::all();
        $jewelryTypes = JewelryType::all();
        $purposeOfValuations = PurposeOfValuation::all();
        $studdedStones = StuddedStone::all();
        $units = Unit::all();
        $articles = $serviceOrder->articles;
        $order = $serviceOrder;
        
        return view('admin.service_orders.edit', compact('clients', 'jewelryTypes', 'studdedStones', 'articles', 'order', 'purposeOfValuations', 'units'));
    }

    /**
     * Update the specified service order in storage.
     */
    public function update(ServiceOrderRequest $request, ServiceOrder $serviceOrder)
    {
        try {
            DB::beginTransaction();

            // Update Service Order
            $serviceOrder->update([
                'client_id' => $request->client_id,
                'service_type' => $request->service_type,
                'purpose_id' => $request->purpose ?? null,
                'consultation' => $request->consultation ?? null,
                'has_other_owners' => $request->has_other_owners ?? false,
                'how_many' => $request->how_many ?? null,
                'ownership_percentage' => $request->ownership_percentage ?? null,
                'government_referral' => $request->government_referral ?? null,
                'other_use_of_report' => $request->other_use_of_report ?? null,
                'delivery_date' => $request->delivery_date ?? null,
                'comment' => $request->comment ?? null,
            ]);

            // Get existing article IDs
            $existingArticleIds = $serviceOrder->articles()->pluck('id')->toArray();
            $submittedArticleIds = [];

            // Process articles
            if ($request->has('articles') && is_array($request->articles)) {
                foreach ($request->articles as $articleIndex => $articleData) {
                    // Skip empty articles
                    if (empty($articleData['jewellery_type_id']) && empty($articleData['total_weight'])) {
                        continue;
                    }

                    // Check if this is an existing article
                    if (isset($articleData['id']) && in_array($articleData['id'], $existingArticleIds)) {
                        $gjpItem = GjpItem::find($articleData['id']);
                        $submittedArticleIds[] = $articleData['id'];

                        // Update article
                        $gjpItem->update([
                            'jewellery_type_id' => $articleData['jewellery_type_id'] ?? null,
                            'total_weight' => $articleData['total_weight'] ?? null,
                            'weight_unit_id' => $articleData['weight_unit'] ?? 'grams',
                            'studded_stone_id' => $articleData['studded_stone_id'] ?? null,
                            'comment' => $articleData['comment'] ?? null,
                        ]);
                    } else {
                        // Create new article
                        $gjpItem = GjpItem::create([
                            'service_order_id' => $serviceOrder->id,
                            'jewellery_type_id' => $articleData['jewellery_type_id'] ?? null,
                            'total_weight' => $articleData['total_weight'] ?? null,
                            'weight_unit_id' => $articleData['weight_unit'] ?? 'grams',
                            'studded_stone_id' => $articleData['studded_stone_id'] ?? null,
                            'comment' => $articleData['comment'] ?? null,
                            'article_belonging_file' => null,
                            'previous_valuation_report' => null,
                            'invoice_file' => null,
                            'attachment_file' => null,
                        ]);
                    }

                    // Handle article-level file uploads
                    if ($request->hasFile("articles.$articleIndex.article_belonging_file")) {
                        if ($gjpItem->article_belonging_file) {
                            Storage::disk('public')->delete($gjpItem->article_belonging_file);
                        }
                        $path = $request->file("articles.$articleIndex.article_belonging_file")
                            ->store('service_orders/articles', 'public');
                        $gjpItem->update(['article_belonging_file' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.previous_valuation_report")) {
                        if ($gjpItem->previous_valuation_report) {
                            Storage::disk('public')->delete($gjpItem->previous_valuation_report);
                        }
                        $path = $request->file("articles.$articleIndex.previous_valuation_report")
                            ->store('service_orders/valuations', 'public');
                        $gjpItem->update(['previous_valuation_report' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.invoice_file")) {
                        if ($gjpItem->invoice_file) {
                            Storage::disk('public')->delete($gjpItem->invoice_file);
                        }
                        $path = $request->file("articles.$articleIndex.invoice_file")
                            ->store('service_orders/invoices', 'public');
                        $gjpItem->update(['invoice_file' => $path]);
                    }

                    if ($request->hasFile("articles.$articleIndex.attachment_file")) {
                        if ($gjpItem->attachment_file) {
                            Storage::disk('public')->delete($gjpItem->attachment_file);
                        }
                        $path = $request->file("articles.$articleIndex.attachment_file")
                            ->store('service_orders/attachments', 'public');
                        $gjpItem->update(['attachment_file' => $path]);
                    }

                    // Handle pictures for this article (create, update, and delete)
                    if (isset($articleData['images']) && is_array($articleData['images'])) {
                        foreach ($articleData['images'] as $picIndex => $imageData) {
                            if (is_array($imageData)) {
                                // Check if this is an existing image (has an ID)
                                if (isset($imageData['id']) && !empty($imageData['id'])) {
                                    // Existing image - update it
                                    $existingImage = GjpItemImage::find($imageData['id']);
                                    
                                    if ($existingImage) {
                                        // Check if a new file was uploaded
                                        if ($request->hasFile("articles.$articleIndex.images.$picIndex.file")) {
                                            // Delete old file
                                            if ($existingImage->image_path) {
                                                Storage::disk('public')->delete($existingImage->image_path);
                                            }
                                            
                                            // Upload new file
                                            $newPath = $request->file("articles.$articleIndex.images.$picIndex.file")
                                                ->store('service_orders/pictures', 'public');
                                            
                                            $existingImage->update([
                                                'image_path' => $newPath,
                                                'name' => $imageData['name'] ?? null,
                                                'for_testing' => isset($imageData['for_testing']) ? 1 : 0,
                                                'for_valuation_report' => isset($imageData['for_valuation_report']) ? 1 : 0,
                                            ]);
                                        } else {
                                            // No new file - just update metadata
                                            $existingImage->update([
                                                'name' => $imageData['name'] ?? null,
                                                'for_testing' => isset($imageData['for_testing']) ? 1 : 0,
                                                'for_valuation_report' => isset($imageData['for_valuation_report']) ? 1 : 0,
                                            ]);
                                        }
                                    }
                                } else {
                                    // New image - create it
                                    if ($request->hasFile("articles.$articleIndex.images.$picIndex.file")) {
                                        $picturePath = $request->file("articles.$articleIndex.images.$picIndex.file")
                                            ->store('service_orders/pictures', 'public');
                                        
                                        GjpItemImage::create([
                                            'gjp_item_id' => $gjpItem->id,
                                            'image_path' => $picturePath,
                                            'name' => $imageData['name'] ?? null,
                                            'for_testing' => isset($imageData['for_testing']) ? 1 : 0,
                                            'for_valuation_report' => isset($imageData['for_valuation_report']) ? 1 : 0,
                                        ]);
                                    }
                                }
                            }
                        }
                    }

                    // Handle deleted images
                    if (isset($articleData['images_to_delete']) && is_array($articleData['images_to_delete'])) {
                        foreach ($articleData['images_to_delete'] as $imageIdToDelete) {
                            $imageToDelete = GjpItemImage::find($imageIdToDelete);
                            
                            if ($imageToDelete) {
                                // Delete the file from storage
                                if ($imageToDelete->image_path) {
                                    Storage::disk('public')->delete($imageToDelete->image_path);
                                }
                                
                                // Delete the database record
                                $imageToDelete->delete();
                            }
                        }
                    }
                }
            }

            // Delete articles that were not in the submitted form
            $articlesToDelete = array_diff($existingArticleIds, $submittedArticleIds);
            foreach ($articlesToDelete as $articleId) {
                $article = GjpItem::find($articleId);
                if ($article) {
                    // Delete all images first
                    foreach ($article->images as $image) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                    // Delete files
                    if ($article->article_belonging_file) Storage::disk('public')->delete($article->article_belonging_file);
                    if ($article->previous_valuation_report) Storage::disk('public')->delete($article->previous_valuation_report);
                    if ($article->invoice_file) Storage::disk('public')->delete($article->invoice_file);
                    if ($article->attachment_file) Storage::disk('public')->delete($article->attachment_file);
                    // Delete article
                    $article->delete();
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.service-orders.index')
                ->with('success', 'Service Order updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error updating service order: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified service order from storage.
     */
    public function destroy(Request $request, ServiceOrder $serviceOrder)
    {
        try {
            DB::beginTransaction();
            $serviceOrder->delete_reason = $request->delete_reason;
            $serviceOrder->save();
            // Delete all articles and their images
            foreach ($serviceOrder->articles as $article) {
                // Delete images
                foreach ($article->images as $image) {
                    Storage::disk('public')->delete($image->image_path);
                }
                // Delete article files
                if ($article->article_belonging_file) Storage::disk('public')->delete($article->article_belonging_file);
                if ($article->previous_valuation_report) Storage::disk('public')->delete($article->previous_valuation_report);
                if ($article->invoice_file) Storage::disk('public')->delete($article->invoice_file);
                if ($article->attachment_file) Storage::disk('public')->delete($article->attachment_file);
            }

            // Delete the service order
            $serviceOrder->delete();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Service Order deleted successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    public function getSignatureContent($id)
    {
        $contractCms = ContractCms::first();
        if($contractCms) {
            return response()->json([
                'status' => true,
                'message' => 'Contract fetch successfully.',
                'contract_en' => $contractCms->contract_en ?? "",
                'contract_ar'  => $contractCms->contract_ar ?? "",
            ]);
        }  else {
            return response()->json([
                'status' => false,
                'message' => 'Contract not found.'
            ]);
        }
    }

    public function uploadSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required',
            'order_id'  => 'required|exists:service_order,id',
        ]);

        $order = ServiceOrder::find($request->order_id);

        // Get the base64 string
        $base64_image = $request->input('signature');

        // Remove metadata prefix
        $image_parts = explode(";base64,", $base64_image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1]; // png, jpg, etc.
        $image_base64 = base64_decode($image_parts[1]);

        // Generate filename
        $fileName = 'signature_' . $order->id . '_' . time() . '.' . $image_type;

        // Ensure the directory exists
        $directory = storage_path('app/public/signatures');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Save the image
        $path = $directory . '/' . $fileName;
        file_put_contents($path, $image_base64);

        // Save path in DB
        $order->e_signature_path = 'signatures/' . $fileName; // relative to storage/app/public
        $order->is_signed = '1';
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Signature uploaded successfully!',
            'path' => 'storage/signatures/' . $fileName // for frontend use
        ]);
    }

    public function submitOrder(Request $request)
    {
        $order = ServiceOrder::find($request->order_id);

        if (!$order) {
            return response()->json(['status' => false, 'message' => 'Order not found'], 404);
        }

        $order->is_submited = true;
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Service order submitted successfully!'
        ]);
    }

}
