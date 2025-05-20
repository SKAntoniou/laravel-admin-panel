<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('dashboard', [
            'companies' => $companies
        ]);
    }

}
