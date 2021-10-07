<?php


class Department
{
    public $id;
    public $name;
    public $fid;

    /**
     * Department constructor.
     * @param $id
     * @param $name
     * @param $fid
     */
    public function __construct($id, $name, $fid)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fid = $fid;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT s.DepartmentId, s.Name, s.Faculties_FacultyId FROM Departments s");
        foreach($req as $department) {
            $list[] = new Student($department['DepartmentId'], $department['Name'], $department['Faculties_FacultyId']);
        }
        return $list;
    }

    public static function find($id) {
        $id = intval($id);
        $req = Database::query("SELECT s.DepartmentId, s.Name, s.Faculties_FacultyId FROM Departments s where s.DepartmentId = $id");
        $department = $req[0];
        return new Student($department['DepartmentId'], $department['Name'], $department['Faculties_FacultyId']);
    }

    public static function save($name, $fid)
    {
        return Database::query("INSERT INTO Departments (Name, Faculties_FacultyId) values ('$name', '$fid')");
    }

    public static function update($id, $name, $fid)
    {
        return Database::query("UPDATE Departments SET name = '$name', Faculties_FacultyId = '$fid' where DepartmentId = '$id'");
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM Departments WHERE DepartmentId = '$id'");
    }
}
