<?php


class DBController
{
    //Database connection Properties

    public $conc = null;
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "elashry1072005";
    protected $dbname = "shopee";

    public function __construct()
    {
        $this->conc = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conc->connect_error) {
            echo 'Failed to connect to Database' . $this->conc->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection()
    {
        if ($this->conc != null) {
            $this->conc->close();
            $this->conc = null;
        }
    }
}

