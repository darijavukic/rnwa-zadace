<?php


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $data['students'] = $students;
        self::CreateView('StudentIndexView', $data);
    }

    public function create()
    {
        $faculties = Faculty::all();
        $data['faculties'] = $faculties;
        self::CreateView('StudentAddView', $data);
    }

    public function store($request)
    {
        Student::save($request['name'], $request['fid']);
        $this->index();
    }

    public function edit($req)
    {
        $faculties = Faculty::all();
        $student = Student::find($req['student_id']);
        $data['faculties'] = $faculties;
        $data['student'] = $student;
        self::CreateView('StudentEditView', $data);
    }

    public function update($request)
    {

        Student::update($request['sid'], $request['fid'], $request['name']);

        $this->edit(['student_id' => $request['sid']]);
    }

    public function delete($request)
    {
        Student::delete($request['student_id']);
        $this->index();
    }
}
