<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $input = $request->all();
        return response()->json(Company::create($input), Response::HTTP_OK);
    }

    public function filter(Request $request)
    {
        return Company::filter($request->input('clauses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company $Company
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return new CompanyResource(Company::find($uuid));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company $Company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        return Company::destroy($uuid);
    }
}
