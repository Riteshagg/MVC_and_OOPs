<?php
namespace Common\Database;
 class DBConnection extends \mysqli
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'self';
    public $conn;
    //Create connection
    public function __construct()
    {
        parent::__construct($this->host, $this->username, $this->password, $this->database);
    }



}



?>
