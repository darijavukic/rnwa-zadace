<?php


class Post
{
    public $post_id;
    public $post_content;
    public $post_author_id;
    public $post_author_name;
    public $post_time;

    /**
     * Post constructor.
     * @param $post_id
     * @param $post_content
     * @param $post_author_id
     * @param $post_time
     */
    public function __construct($post_id, $post_content,$post_author_name, $post_author_id, $post_time)
    {
        $this->post_id = $post_id;
        $this->post_content = $post_content;
        $this->post_author_id = $post_author_id;
        $this->post_author_name = $post_author_name;
        $this->post_time = $post_time;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT p.*, a.aid, CONCAT(a.first_name, ' ', a.last_name) AS full_name FROM posts p INNER JOIN authors a ON p.aid=a.aid");
        foreach($req as $post) {
            $list[] = new Post($post['pid'], $post['content'],$post['full_name'], $post['aid'], $post['time']);
        }
        return $list;
    }

    public static function find($pid) {
        $pid = intval($pid);
        $req = Database::query("SELECT p.*, a.aid, CONCAT(a.first_name, ' ', a.last_name) AS full_name FROM posts p INNER JOIN authors a ON p.aid=a.aid where p.pid = $pid");
        $post = $req[0];
        return new Post($post['pid'], $post['content'],$post['full_name'], $post['aid'], $post['time']);
    }

    public static function save($aid, $content)
    {
        return Database::query("INSERT INTO posts (content, aid) values ('$content', '$aid')");
    }

    public static function update($pid, $aid, $content)
    {
        return Database::query("UPDATE posts SET content = '$content', aid = '$aid' where pid = '$pid'");
    }

    public static function delete($pid)
    {
        return Database::query("DELETE FROM posts WHERE pid = '$pid'");
    }


}