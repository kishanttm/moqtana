<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientRequest $request)
    {
        $data = $request->validated();

        // Handle file uploads
        if ($request->hasFile('individual_documents')) {
            $data['individual_documents'] = $request->file('individual_documents')->store('clients/documents', 'public');
        }

        if ($request->hasFile('documents')) {
            $data['documents'] = $request->file('documents')->store('clients/documents', 'public');
        }

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('clients/logos', 'public');
        }

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    public function show(Client $client)
    {
         if (request()->expectsJson() || request()->wantsJson()) {
            return response()->json($client);
        }
        
        return view('admin.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->validated();

        // Handle file uploads — replace old files if new ones are uploaded
        if ($request->hasFile('individual_documents')) {
            if ($client->individual_documents) {
                Storage::disk('public')->delete($client->individual_documents);
            }
            $data['individual_documents'] = $request->file('individual_documents')->store('clients/documents', 'public');
        }

        if ($request->hasFile('documents')) {
            if ($client->documents) {
                Storage::disk('public')->delete($client->documents);
            }
            $data['documents'] = $request->file('documents')->store('clients/documents', 'public');
        }

        if ($request->hasFile('company_logo')) {
            if ($client->company_logo) {
                Storage::disk('public')->delete($client->company_logo);
            }
            $data['company_logo'] = $request->file('company_logo')->store('clients/logos', 'public');
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Client deleted successfully.',
            ]);
        }

        return redirect()->route('clients.index')->with('success', 'Client deleted');
    }

    public function getById(Client $client)
    {
        return response()->json($client);
    }
}


