<?php


class Category
{
    public $category_id;
    public $category_name;
    public $category_info;
    public $category_type;
    /**
     * Post constructor.
     * @param $category_id
     * @param $category_name
     * @param $category_info
     * @param $category_type
     */
    public function __construct($category_id, $category_name, $category_info, $category_type)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->category_info = $category_info;
        $this->category_type = $category_type;
    }


    public static function all() {
        $list = [];
        $req = Database::query("SELECT * FROM categories");
        foreach($req as $category) {
            $list[] = new Category($category['category_id'], $category['category_name'],$category['category_info'], $category['category_type']);
        }
        return $list;
    }

    public static function find($cid) {
        $cid = intval($cid);
        $req = Database::query("SELECT * FROM categories WHERE category_id = $cid");
        $category = $req[0];
        return new Category($category['category_id'], $category['category_name'],$category['category_info'], $category['category_type']);    
    }

    public static function save($category_name,$category_info,$category_type)
    {
        Database::query("INSERT INTO categories (category_name, category_info, category_type) VALUES ('$category_name','$category_info','$category_type')");
    }

    public static function update($category_id, $category_name, $category_info, $category_type)
    {
        Database::query("UPDATE categories SET category_name = '$category_name', category_info = '$category_info', category_type = '$category_type' WHERE category_id = '$category_id'");
    }

    public static function delete($category_id)
    {
        Database::query("DELETE FROM categories where category_id = '$category_id'");
    }

}