<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        if($request->logo){
            $companyLogo = $request->logo->store('companies');
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $companyLogo ?? null,
        ]);
        return redirect()->route('companies.index')->with('success', 'Company successfully created');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        if($request->logo){
            $companyLogo = $request->logo->store('companies');
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $companyLogo ?? null,
        ]);
        return redirect()->route('companies.index')->with('success', 'Company successfully edited');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company successfully deleted');
    }
}
