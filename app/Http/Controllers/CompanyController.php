<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use App\Models\Company;

class CompanyController extends Controller
{
  public function create()
  {
    return view('company/create');
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'name' => ['required', 'max:254'],
      'email' => ['required', 'email', 'unique:companies,email', 'max:254'],
      'website' => ['required', 'max:254'],
      'logo' => ['required', File::types(['png', 'jpg', 'webp'])]
    ]);

    $logoPath = $request->logo->store('logos');
    Company::create([
      'name' => $attributes['name'],
      'email' => $attributes['email'],
      'website' => $attributes['website'],
      'logo' => $logoPath
    ]);

    return redirect('/');
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
      'email' => ['required', 'email', 'max:254'],
      'website' => ['required', 'max:254'],
      'logo' => [File::types(['png', 'jpg', 'webp'])]
    ]);
    
    $attributesToUpdate = [
      'name' => $attributes['name'],
      'email' => $attributes['email'],
      'website' => $attributes['website'],
    ];
    if (array_key_exists('logo', $attributes)) {
      $logoPath = $request->logo->store('logos');
      $attributesToUpdate['logo'] = $logoPath;
    }
    
    Company::where('id', $attributes['id'])->update($attributesToUpdate);

    return redirect('/company/' . $attributes['id']);
  }

}