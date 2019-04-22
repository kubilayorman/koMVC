<?php
// PDO Database class
// Connect to databas
// Create prepared statements
// Bind values
// Return rows and results

class Database {

    private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $dbname = DB_NAME;

    // Database handler, equal to $vt in php-kursu
    private $dbh;
    // Statement handler
    private $stmt;
    // Error handler
    private $error;

    public function __construct() {

        // Data source name string
        $dsn = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=utf8";
        // PDO options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        );

        //Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
            //echo "Connected to databse";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement with query
    public function query($sql) {

        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null) {

        if(is_null($type)) {

            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get results, set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        //return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get single record as object
    public function resultSetSingle() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
        //return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get single record as associative array
    public function resultSetSingleAssoc() {
        $this->execute();
        //return $this->stmt->fetch(PDO::FETCH_OBJ);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }

}




?>