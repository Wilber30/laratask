<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{

public function index() {
  $employees = \App\Models\Employee::paginate(10);
  return view ('admin.employees.index', compact('employees'));
}
public function edit(Employee $employee)
{
  return view('admin.employees.edit', ['employee' => $employee]);
}

public function destroy(Employee $employee)
{
  $employee->delete();

  return back()->with('success', 'Deleted!');
}

public function update(Employee $employee)
{
    $attributes = request()->validate([
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => ['required', Rule::unique('employees', 'email')],
      'phone' => 'required'
    ]);

    $employee->update($attributes);

    return back()->with('success', 'Employee record Updated!');
}

public function create()
{
    return view('admin.employees.create');
}

public function store(Request $request)
{
  $attributes = request()->validate([
    'first_name' => 'required',
    'last_name' => 'required',
    'email' => ['required', Rule::unique('employees', 'email')],
    'phone' => 'required'
  ]);

  $attributes['user_id'] = auth()->id();

  Employee::create($attributes);

  return redirect()->back()->with('success', 'The Employee has been added.');
  $request->session()->keep(['first_name', 'last_name']);
  }
}
