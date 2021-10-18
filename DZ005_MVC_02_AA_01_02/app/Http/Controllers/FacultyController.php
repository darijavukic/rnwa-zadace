<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'name' => 'string|required|min:3|max:45',
        ]);

        $faculty = Faculty::create([
            'name' => $attr['name'],
        ]);

        return $this->success($faculty, 'Faculty created successfully');
    }

    public function index() {
        $faculties = Faculty::all();

        return view('faculties')->with('faculties', $faculties);
    }

    public function edit($id) {
        $faculty = Faculty::find($id);
        return view('edit.faculties')->with(['faculty' => $faculty]);
    }

    public function delete(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required'
        ]);

        Faculty::destroy([$attr['id']]);
        return $this->success(null, 'Faculty deleted successfully');
    }

    public function update(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required',
            'name' => 'string|required|min:3|max:45',
        ]);

        $faculty = Faculty::find($attr['id']);
        $faculty->name = $attr['name'];
        $faculty->save();

        return $this->success($faculty, 'Faculty updated successfully');
    }
}
