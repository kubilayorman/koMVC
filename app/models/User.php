<?php 

class User {

    private $db;

    public function __construct() {

        $this->db = new Database;

    }

    // Find user by Email

    public function findUserByEmail($email) {

        // Prepare sql query
        $this->db->query('SELECT * FROM users where email=:email');

        // Bind the params with values
        $this->db->bind(':email', $email);

        // Get all DB values back into variable
        $row = $this->db->resultSetSingle();

        // Check if values are retrieved from DB
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function findUserById($id) {

        $this->db->query('SELECT * FROM users where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingle();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function findUserByIdInArray($id) {

        $this->db->query('SELECT * FROM users where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingleAssoc();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function updateUser($data) {


        //$this->db->query("insert into users (name, email, password) values(:name, :email, :password)");
        $this->db->query("UPDATE users SET name=:name, email=:email, password=:password WHERE id=:id");
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteUser($id) {

        $this->db->query('DELETE FROM users WHERE id=:id');

        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function login($email, $password) {

        // Prepare sql query
        $this->db->query('SELECT * FROM users where email=:email');
        // Bind params with value
        $this->db->bind(':email', $email);

        // Get DB reults back into variable
        $row = $this->db->resultSetSingle();

        // Pull password from collected objects
        $passwordDB = $row->password;

        // Check if entered password and password in DB is the same
        // use password_verify function later for now just check if password is the same
        if($password == $passwordDB) {
            return $row;
        } else {
            return false;
        }

    }



}




?>