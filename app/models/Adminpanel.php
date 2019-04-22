<?php 

class Adminpanel {

    private $db;

    public function __construct() {

        $this->db = new Database;

    }


    public function getAllUsers() {

        $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();

        return $results;

    }

    // this method is used to show all cases in the adminpanel
    public function getAllCases() {

        $this->db->query("SELECT * FROM cases");

        $results = $this->db->resultSet();

        return $results;

    }

    public function getAllInsights() {

        $this->db->query("SELECT * FROM posts");

        $results = $this->db->resultSet();

        return $results;

    }

    public function register($newUser) {

        // Prepare sql statement
        $this->db->query('insert into users set name=:name, email=:email, password=:password');

        // Bind params with values
        $this->db->bind(':name', $newUser['name']);
        $this->db->bind(':email', $newUser['email']);
        $this->db->bind(':password', $newUser['password']);

        //Execute sql
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }



}





?>