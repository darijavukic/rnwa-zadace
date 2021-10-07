<?php


class Faculty
{
    public $id;
    public $name;

    /**
     * Faculty constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT f.FacultyId, f.Name FROM faculties f");
        foreach($req as $faculty) {
            $list[] = new Faculty($faculty['FacultyId'], $faculty['Name']);
        }
        return $list;
    }

    public static function find($id) {
        $id = intval($id);
        $req = Database::query("SELECT f.FacultyId, f.Name FROM faculties f where f.FacultyId = $id");
        $faculty = $req[0];
        return new Faculty($faculty['FacultyId'], $faculty['Name']);
    }

    public static function save($name)
    {
        return Database::query("INSERT INTO faculties (Name) values ('$name')");
    }

    public static function update($id, $name)
    {
        return Database::query("UPDATE faculties SET Name = '$name' where FacultyId = '$id'");
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM faculties WHERE FacultyId = '$id'");
    }
}
