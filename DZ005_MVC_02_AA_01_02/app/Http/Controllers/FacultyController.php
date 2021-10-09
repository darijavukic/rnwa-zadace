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
}
