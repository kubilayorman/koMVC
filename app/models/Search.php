<?php

class Search {

    private $db;

    public function __construct() {

        $this->db = new Database;

    } 

    public function getSearchResults($search = null) {

        $this->db->query("SELECT * FROM posts WHERE title LIKE '%$search%' OR body LIKE '%$search%' 
                          UNION 
                          SELECT * FROM cases WHERE title LIKE '%$search%' OR body LIKE '%$search%'");

        $results = $this->db->resultSet();

        if($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }
    }

}

?>