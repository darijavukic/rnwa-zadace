<?php


class Student
{
    public $id;
    public $name;
    public $fid;

    /**
     * Faculty constructor.
     * @param $id
     * @param $name
     * @param $fid
     */
    public function __construct($id, $name, $fid, $faculty_name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fid = $fid;
        $this->faculty_name = $faculty_name;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT s.StudentId, s.Name, s.Faculties_FacultyId, f.Name as FacultyName FROM Students s INNER JOIN Faculties f ON s.Faculties_FacultyId=f.FacultyId");
        foreach($req as $student) {
            $list[] = new Student($student['StudentId'], $student['Name'], $student['Faculties_FacultyId'], $student['FacultyName']);
        }
        return $list;
    }

    public static function find($id) {
        $id = intval($id);
        $req = Database::query("SELECT s.StudentId, s.Name, s.Faculties_FacultyId, f.name as FacultyName FROM Students s INNER JOIN Faculties f ON s.Faculties_FacultyId=f.FacultyId where s.StudentId = $id");
        $student = $req[0];
        return new Student($student['StudentId'], $student['Name'], $student['Faculties_FacultyId'], $student['FacultyName']);
    }

    public static function save($name, $fid)
    {
        return Database::query("INSERT INTO Students (Name, Faculties_FacultyId) values ('$name', '$fid')");
    }

    public static function update($id, $name, $fid)
    {
        return Database::query("UPDATE Students SET name = '$name', Faculties_FacultyId = '$fid' where StudentId = '$id'");
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM Students WHERE StudentId = '$id'");
    }
}
