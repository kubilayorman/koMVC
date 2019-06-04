<?php 

class Insight {

    private $db;

    public function __construct() {

        $this->db = new Database;

    }

    public function getInsights() {

        $this->db->query('SELECT *,
                          posts.id as insightId,
                          users.id as userId, 
                          posts.created_at as insightCreated,
                          users.created_at as userCreated
                          FROM posts
                          INNER JOIN users
                          ON posts.user_id = users.id
                          ORDER BY posts.created_at DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getInsightSingle($id = null) {

        //echo $id;
        //die;

        $this->db->query("SELECT *,
                          posts.id as insightId,
                          users.id as userId, 
                          posts.created_at as insightCreated,
                          users.created_at as userCreated
                          FROM posts
                          INNER JOIN users
                          ON posts.user_id = users.id
                          WHERE posts.id=:postid
                          ORDER BY posts.created_at DESC
                          ");
        
        $this->db->bind(":postid", $id);

        $results = $this->db->resultSetSingle();

        if($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }

    }

    public function findInsightById($id) {

        $this->db->query('SELECT * FROM posts where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingle();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function findInsightByIdAsArray($id) {

        $this->db->query('SELECT * FROM posts where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingleAssoc();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function addInsight($newInsight) {

        // Prepare sql statement
        $this->db->query("INSERT INTO posts set title=:title, sub_title=:sub_title, body=:body, date_stamp=:date_stamp, user_name=:user_name, user_id=:id");

        // Bind params
        $this->db->bind(":title", $newInsight['title']);
        $this->db->bind(":sub_title", $newInsight['sub_title']);
        $this->db->bind(":body", $newInsight['body']);
        $this->db->bind(":date_stamp", $newInsight['date_stamp']);
        $this->db->bind(":user_name", $newInsight['user_name']);
        $this->db->bind(":id", $newInsight['id']);

        // Execute sql
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateInsight($data) {

        $this->db->query("UPDATE posts SET title=:title, sub_title=:sub_title, body=:body WHERE id=:id");
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':sub_title', $data['sub_title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteInsight($id) {

        $this->db->query('DELETE FROM posts WHERE id=:id');

        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }



}




?>