<?php

require(SYSTEM . 'exception/DatabaseException.class.php');

class MySQLiDatabase
{
    public $MySQLi;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
        $this->selectDatabase();
    }

    public function connect()
    {
        $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            throw new DatabaseException('Connection error, failed to connect to your database');
        }
    }
    public function sendQuery($sql)
    {
        $this->result = $this->MySQLi->query($sql);

        if($this->result === false){
            throw new DatabaseException("Please input proper SQL" . $sql . $this);
        }

        return $this->result;
    }

    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false) {
            throw new DatabaseException('Database not selected' . $this->database, $this);
        }
    }
}
