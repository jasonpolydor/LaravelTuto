<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        //find instance of company model where id
        $companyUpdate = Company::find($company->id);

        //update data
        $companyUpdate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if($companyUpdate){
            return redirect()->route('companies.show', ['company' =>$company->id])
                             ->with('success', 'Company updated successfully');
        }

        //redirect to page that we just edited
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $findCompany = Company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')
                             ->with('success', 'Company deleted successfully');
        }

        return back()->withInput()->with('error', 'COmpany could not be deleted');
    }

}
