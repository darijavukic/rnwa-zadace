<?php


class Author
{
    public $aid;
    public $full_name;

    /**
     * Author constructor.
     * @param $aid
     * @param $full_name
     */
    public function __construct($aid, $full_name)
    {
        $this->aid = $aid;
        $this->full_name = $full_name;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT a.aid, CONCAT(a.first_name, ' ', a.last_name) AS full_name FROM authors a");
        foreach($req as $author) {
            $list[] = new Author($author['aid'], $author['fullname']);
        }
        return $list;
    }

    public static function find($id) {
        $aid = intval($id);
        $req = Database::query("SELECT a.aid, CONCAT(a.first_name, ' ', a.last_name) AS fullname FROM authors a where a.aid = $aid");
        $author = $req[0];
        return new Author($author['aid'], $author['full_name']);
    }


}