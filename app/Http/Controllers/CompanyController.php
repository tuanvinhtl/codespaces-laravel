<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\CompanyCollection
     */
    public function index()
    {
        return new CompanyCollection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest $request
     * @return \App\Http\Resources\CompanyResource
     */
    public function store(StoreCompanyRequest $request)
    {
        return new CompanyResource(Company::create($request->all()));
    }

    public function filter(Request $request)
    {
        return Company::filter($request->input('clauses'), $request->query());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $uuid
     * @return \App\Http\Resources\CompanyResource
     */
    public function show($uuid)
    {
        return new CompanyResource(Company::find($uuid));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $uuid)
    {
        return Company::find($uuid)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return number
     */
    public function destroy($uuid)
    {
        return Company::destroy($uuid);
    }
}
