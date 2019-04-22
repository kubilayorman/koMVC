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

    public function addInsight($newInsight) {

        // Prepare sql statement
        $this->db->query("INSERT INTO posts set title=:title, body=:body, user_id=:id");

        // Bind params
        $this->db->bind(":title", $newInsight['title']);
        $this->db->bind(":body", $newInsight['body']);
        $this->db->bind(":id", $newInsight['id']);

        // Execute sql
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }


    }



}




?>