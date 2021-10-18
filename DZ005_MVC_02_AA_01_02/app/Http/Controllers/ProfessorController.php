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

    public function edit($id) {
        $professor = Professor::with('department')->find($id);
        $departments = Department::all();
        return view('edit.professors')->with(['professor' => $professor, 'departments' => $departments]);
    }

    public function delete(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required'
        ]);

        Professor::destroy([$attr['id']]);
        return $this->success(null, 'Professor deleted successfully');
    }

    public function update(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required',
            'name' => 'string|required|min:3|max:45',
            'department_id' => 'numeric|required'
        ]);

        $professor = Professor::find($attr['id']);
        $professor->name = $attr['name'];
        $professor->department_id = $attr['department_id'];
        $professor->save();

        return $this->success($professor, 'Professor updated successfully');
    }
}
