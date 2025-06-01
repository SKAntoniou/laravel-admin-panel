<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use App\Models\Company;
use App\Models\Employee;

class CompanyController extends Controller
{
  public function show(Company $company)
  {
    $employees = Employee::where('company_id', $company['id'])->latest()->paginate(12);

    // dd($employees);
    return view('company.show', ['company' => $company, 'employees' => $employees]);
  }

  public function create()
  {
    return view('company/create');
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'unique:companies,name', 'max:254'],
      'email' => ['nullable', 'email', 'unique:companies,email', 'max:254'],
      'website' => ['nullable', 'url', 'max:254'],
      'logo' => ['nullable', File::image()
        ->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100))]
    ]);

    $validAttributes = [];
    foreach ($attributes as $key => $value) {
      // This is to check if logo exists and is valid. Logo needs different behaviour.
      if ($key === 'logo') {
        if ($value) {
          $logoPath = $request->logo->store('logos');
          $validAttributes[$key] = $logoPath;
        }
      } elseif ($value) {
        $validAttributes[$key] = $value;
      }
    }
    Company::create($validAttributes);

    return redirect($request['redirect_to']);
  }

  public function edit(Company $company)
  {
    return view('company.edit', ['company' => $company]);
  }

  public function update(Request $request)
  {
    $attributes = $request->validate([
      'id' => ['required'],
      'name' => ['required', 'max:254'],
      'email' => ['nullable', 'email', 'max:254'],
      'website' => ['nullable', 'url', 'max:254'],
      'logo' => ['nullable', File::image()
        ->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100))]
    ]);
    $oldValues = Company::findOrFail($attributes['id']);

    $validAttributes = [];
    foreach ($attributes as $key => $value) {
      if ($key === 'logo') {
        if ($value) {
          // Delete the old logo file
          if ($oldValues->logo && Storage::exists($oldValues->logo)) {
            Storage::delete($oldValues->logo);
          }
          $logoPath = $request->logo->store('logos');
          $validAttributes[$key] = $logoPath;
        }
      } elseif ($value) {
        $validAttributes[$key] = $value;
      }
    }

    Company::where('id', $attributes['id'])->update($validAttributes);

    return redirect($request['redirect_to']);
  }

  public function delete(Request $request, Company $company)
  {
    if ($company->logo && Storage::exists($company->logo)) {
      Storage::delete($company->logo);
    }
    $company->delete();
    return redirect('/');
  }
}
