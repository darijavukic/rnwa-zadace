<?php

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        $data['faculties'] = $faculties;
        self::CreateView('FacultyIndexView', $data);
    }

    public function create()
    {
        self::CreateView('FacultyAddView');
    }

    public function store($request)
    {
        Faculty::save($request['faculty_name']);
        $this->index();
    }

    public function edit($req)
    {
        $faculty = Faculty::find($req['faculty_id']);
        $data['faculty'] = $faculty;
        self::CreateView('FacultyEditView', $data);
    }

    public function update($request)
    {
        Faculty::update($request['fid'], $request['name']);
        $this->edit(['faculty_id' => $request['fid']]);
    }

    public function delete($request)
    {
        Faculty::delete($request['faculty_id']);
        $this->index();
    }
}
