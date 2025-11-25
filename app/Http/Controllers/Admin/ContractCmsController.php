<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContractCms;

class ContractCmsController extends Controller
{
    public function index()
    {
        $contract = ContractCms::first(); // Only one record expected
        return view('admin.cms.contract', compact('contract'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_en' => 'required|string',
            'contract_ar' => 'required|string',
        ], [
            'contract_en.required' => 'Contract in English is required.',
            'contract_en.string'   => 'Contract in English must be a valid text.',

            'contract_ar.required' => 'Contract in Arabic is required.',
            'contract_ar.string'   => 'Contract in Arabic must be a valid text.',
        ]);

        $contract = ContractCms::first();

        if ($contract) {
            $contract->update($request->only('contract_en', 'contract_ar'));
        } else {
            ContractCms::create($request->only('contract_en', 'contract_ar'));
        }

        return redirect()->back()->with('success', 'Contract CMS updated successfully!');
    }
}

