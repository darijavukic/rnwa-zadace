<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Faculty;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'name' => 'string|required|min:3|max:45',
            'faculty_id' => 'numeric|required'
        ]);

        $student = Student::create([
            'name' => $attr['name'],
            'faculty_id' => $attr['faculty_id']
        ]);

        return $this->success($student, 'Student created successfully');
    }

    public function index() {
        $students = Student::with('faculty')->with('courses')->get();
        $faculties = Faculty::all();

        return view('students')->with(['students' => $students, 'faculties' => $faculties]);
    }

    public function edit($id) {
        $student = Student::with('faculty')->find($id);
        $faculties = Faculty::all();
        return view('edit.students')->with(['student' => $student, 'faculties' => $faculties]);
    }

    public function addToCourse(Request $request) : JsonResponse {
        $attr = $request->validate([
            'student_id' => 'numeric|required',
            'course_id' => 'numeric|required'
        ]);

        $student = Student::find($attr['student_id']);
        $student->courses()->attach([$attr['course_id']]);

        return $this->success($student, 'Student added to course');
    }

    public function delete(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required'
        ]);

        Student::destroy([$attr['id']]);
        return $this->success(null, 'Student deleted successfully');
    }

    public function update(Request $request) : JsonResponse {
        $attr = $request->validate([
            'id' => 'numeric|required',
            'name' => 'string|required|min:3|max:45',
            'faculty_id' => 'numeric|required'
        ]);

        $student = Student::find($attr['id']);
        $student->name = $attr['name'];
        $student->faculty_id = $attr['faculty_id'];
        $student->save();

        return $this->success($student, 'Student updated successfully');
    }
}
