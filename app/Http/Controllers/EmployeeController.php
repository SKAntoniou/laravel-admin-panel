<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->with(['company'])->paginate(10);

        return view('employees', [
            'employees' => $employees
        ]);
    }
}
