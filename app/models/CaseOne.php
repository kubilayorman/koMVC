<?php

class CaseOne {

    private $db;

    public function __construct() {

        $this->db = new Database;

    }

    // this method is used to show the results in the fron end view
    public function getCases() {

         $this->db->query('SELECT *,
                            cases.id as caseId,
                            users.id as userId, 
                            cases.created_at as caseCreated,
                            users.created_at as userCreated
                            FROM cases
                            INNER JOIN users
                            ON cases.user_id = users.id
                            ORDER BY cases.created_at DESC
                            ');

        $results = $this->db->resultSet();

        return $results;

    }

    public function findCaseById($id) {

        $this->db->query('SELECT * FROM cases where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingle();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function addCase($newCase) {

        // Prepare sql statement
        $this->db->query("INSERT INTO cases set title=:title, body=:body, user_id=:id");

        // Bind params
        $this->db->bind(":title", $newCase['title']);
        $this->db->bind(":body", $newCase['body']);
        $this->db->bind(":id", $newCase['id']);

        // Execute sql
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }


    }

    public function deleteCase($id) {

        $this->db->query('DELETE FROM cases WHERE id=:id');

        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

}



?>