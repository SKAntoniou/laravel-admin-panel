<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->with(['company'])->paginate(12);

        return view('employee/index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        $company = Company::all()->sortBy('name');
        return view('employee/create', ['companies' => $company]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
        'company_id' => ['required', 'numeric', 'min:0'],
        'first_name' => ['required', 'max:254'],
        'last_name' => ['required', 'max:254'],
        'email' => ['required', 'email', 'max:254'],
        'phone_number' => ['required']
        ]);

        Employee::create($attributes);

        return redirect($request['redirect_to']);
    }

    public function edit(Employee $employee)
    {
        $company = Company::all()->sortBy('name');
        return view('employee.edit', ['employee' => $employee, 'companies' => $company]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'company_id' => ['required', 'numeric', 'min:0'],
            'id' => ['required', 'numeric', 'min:0'],
            'first_name' => ['required', 'max:254'],
            'last_name' => ['required', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'phone_number' => ['required']
        ]);

        Employee::where('id', $attributes['id'])->update($attributes);

        return redirect($request['redirect_to']);
    }

    public function delete(Request $request, Employee $employee,)
    {
        $employee->delete();
        return redirect($request['redirect_to']);
    }
}
