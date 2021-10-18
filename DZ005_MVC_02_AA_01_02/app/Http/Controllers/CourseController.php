<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use App\Models\Department;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'name' => 'string|required|min:3|max:45',
            'professor_id' => 'numeric|required',
            'department_id' => 'numeric|required'
        ]);

        $course = Course::create([
            'name' => $attr['name'],
            'professor_id' => $attr['professor_id'],
            'department_id' => $attr['department_id']
        ]);

        return $this->success($course, 'Course created successfully');
    }

    public function index() {
        $courses = Course::with('professor', 'department')->get();
        $professors = Professor::all();
        $departments = Department::all();

        return view('courses')->with(['courses' => $courses, 'professors' => $professors, 'departments' => $departments]);
    }

    public function edit($id) {
        $course = Course::with('professor', 'department')->find($id);
        $departments = Department::all();
        $professors = Professor::all();

        return view('edit.courses')->with(['course' => $course, 'professors' => $professors, 'departments' => $departments]);
    }

    public function delete(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required'
        ]);

        Professor::destroy([$attr['id']]);
        return $this->success(null, 'Course deleted successfully');
    }

    public function update(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required',
            'name' => 'string|required|min:3|max:45',
            'professor_id' => 'numeric|required',
            'department_id' => 'numeric|required',
        ]);

        $course = Course::find($attr['id']);
        $course->name = $attr['name'];
        $course->professor_id = $attr['professor_id'];
        $course->department_id = $attr['department_id'];
        $course->save();

        return $this->success($course, 'Course updated successfully');
    }
}
