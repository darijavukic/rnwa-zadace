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
}
