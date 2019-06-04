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

    public function getCaseSingle($id = null) {

        $this->db->query('SELECT *,
                            cases.id as caseId,
                            users.id as userId,
                            cases.created_at as caseCreated,
                            users.created_at as userCreated
                            FROM cases
                            INNER JOIN users
                            ON cases.user_id = users.id
                            WHERE cases.id =:caseid
                            ORDER BY cases.created_at DESC
                            ');

        $this->db->bind(":caseid", $id);

        $results = $this->db->resultSetSingle();

        if($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }

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

    public function findCaseByIdAsArray($id) {

        $this->db->query('SELECT * FROM cases where id=:id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSetSingleAssoc();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function addCase($newCase) {

        // Prepare sql statement
        $this->db->query("INSERT INTO cases set title=:title, sub_title=:sub_title, body=:body, date_stamp=:date_stamp, user_name=:user_name, user_id=:id");

        // Bind params
        $this->db->bind(":title", $newCase['title']);
        $this->db->bind(":sub_title", $newCase['sub_title']);
        $this->db->bind(":body", $newCase['body']);
        $this->db->bind(":date_stamp", $newCase['date_stamp']);
        $this->db->bind(":user_name", $newCase['user_name']);
        $this->db->bind(":id", $newCase['id']);

        // Execute sql
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCase($data) {

        $this->db->query("UPDATE cases SET title=:title, sub_title=:sub_title, body=:body WHERE id=:id");
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(":sub_title", $data['sub_title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
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