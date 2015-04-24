    <?php

class Database {

//where all the functions are created
    private $connection;
    private $username;
    private $password;
    private $host;
    private $database;
    public $error;

// where all the function that the database uses and doesnt have to continuosly get written
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
        $this->database = $database;

//this connnects the host username and password 
        $this->connection = new mysqli($host, $username, $password);

//if there is an error this message will pop up on screen and 
//it will kill the code so it doesnt run
        if ($this->connection->connect_error) {
            die("Error: " . $this->connection->connect_error);
        }

//Linking the database
        $exists = $this->connection->select_db($database);

//has elements to check if database  exists and create the database
        if (!$exists) {
            $query = $this->connection->query("CREATE DATABASE $database");
//This will create the database and if itts created already it will  go to the else statement 
            if ($query) {
                echo "Database Created: " . $database;
            }
//If database already exists it will write Database Already Exists on the screen
        } else {
            echo "You Have been logged Out";
        }
    }

//instead of having a bunch of code  to open  thev connection over and over again its in one function
    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Error: " . $this->connection->connect_error);
        }
    }

//instead of having a close connection at the end  of the page there is ca function
    public function closeConnection() {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

//this is  so yoou dont have to put a  bunch of stuff in thre query function 
    public function query($string) {
        $this->openConnection();

      //this will conect the string
        $query = $this->connection->query($string);

        if (!$query) {
            $this->error = $this->connection->error;
        }

        $this->closeConnection();

        return $query;
    }

}
