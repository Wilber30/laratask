<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index() {
       $companies = \App\Models\Company::paginate(10);
       return view ('admin.companies.index', compact('companies'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      $attributes = request()->validate([
        'name' => ['required', Rule::unique('companies', 'name')],
        'email' => ['required', Rule::unique('companies', 'email')],
        'website' => 'required',
        'logo' => 'required|image',
        'employee_id' => ['required', Rule::exists('employees', 'id')]
      ]);


      $attributes['user_id'] = auth()->id();

      $attributes['logo'] = request()->file('logo')->store('logos');


      Company::create($attributes);
      return redirect()->back()->with('success', 'The company has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
      return view('admin.companies.edit', ['company' => $company]);
    }

    // public function edit($id)
    // {
    //   $company = Company::find($id);
    //   return view('admin.companies.edit', compact('company'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        $attributes = request()->validate([
          'name' => 'required',
          'email' => 'required',
          'website' => 'required',
          'logo' => 'image'
        ]);

        if (isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        $company->update($attributes);

        return back()->with('success', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
      $company->delete();

      return back()->with('success', 'Deleted!');
    }
}
