<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'name' => 'string|required|min:3|max:45',
            'faculty_id' => 'numeric|required'
        ]);

        $department = Department::create([
            'name' => $attr['name'],
            'faculty_id' => $attr['faculty_id']
        ]);

        return $this->success($department, 'Department created successfully');
    }

    public function index() {
        $departments = Department::with('faculty')->get();
        $faculties = Faculty::all();

        return view('departments')->with(['departments' => $departments, 'faculties' => $faculties]);
    }

    public function edit($id) {
        $department = Department::with('faculty')->find($id);
        $faculties = Faculty::all();
        return view('edit.departments')->with(['department' => $department, 'faculties' => $faculties]);
    }

    public function delete(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required'
        ]);

        Department::destroy([$attr['id']]);
        return $this->success(null, 'Department deleted successfully');
    }

    public function update(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required',
            'name' => 'string|required|min:3|max:45',
            'faculty_id' => 'numeric|required'
        ]);

        $department = Department::find($attr['id']);
        $department->name = $attr['name'];
        $department->faculty_id = $attr['faculty_id'];
        $department->save();

        return $this->success($department, 'Department updated successfully');
    }
}
