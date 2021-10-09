<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Department;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'name' => 'string|required|min:3|max:45',
            'department_id' => 'numeric|required'
        ]);

        $professor = Professor::create([
            'name' => $attr['name'],
            'department_id' => $attr['department_id']
        ]);

        return $this->success($professor, 'Professor created successfully');
    }

    public function index() {
        $professors = Professor::with('department')->get();
        $departments = Department::all();

        return view('professors')->with(['professors' => $professors, 'departments' => $departments]);
    }
}
