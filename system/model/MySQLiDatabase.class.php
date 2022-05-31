<?php

require(SYSTEM . 'exception/DatabaseException.class.php');


/**
 * MySQLiDatabase klasa koja inicijalizira bazu podataka,selektira i konektira se s bazome te salje upite na bazu
 */
class MySQLiDatabase
{
    public $MySQLi;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    /**
     * __construct() sprema hosta, user, password i database u protected varijable
     * takoder pozvia connect i selectDatabase funkcije
     * 
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $database
     * 
     */
    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
        $this->selectDatabase();
    }

    /**
     * connect() funkcija se konektira na localhost bazu podataka
     * ako se ne spoji izbacuje DatabaseException error
     */
    public function connect()
    {
        $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            throw new DatabaseException('Connection error, failed to connect to your database');
        }
    }

    /**
     * sendQuery() salje sql query upite na bazu podataka
     * @param string $sql
     * 
     * @return Object $this->result
     */
    public function sendQuery($sql)
    {
        $this->result = $this->MySQLi->query($sql);

        if($this->result === false){
            throw new DatabaseException("Please input proper SQL" . $sql . $this);
        }

        return $this->result;
    }

     /**
     * selectDatabase() funkcija selektira bazu podataka
     * ako se ne selektira izbacuje DatabaseException error
     */
    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false) {
            throw new DatabaseException('Database not selected' . $this->database, $this);
        }
    }
}
