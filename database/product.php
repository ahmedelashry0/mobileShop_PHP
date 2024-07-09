<?php
//Use to fetch product data
class product
{
public $db = null;
    //dependency injection
    public function __construct(DBController $db)
    {
        if (!isset($db->conc)) return null;
        $this->db =$db;
    }

    //fetch product data
    public function getData($table = 'product')
    {
        $result = $this->db->conc->query("SELECT * FROM $table");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) $resultArray[] = $item;

        return $resultArray;
    }

    public function getProduct($item_id = null, $table = 'product')
    {
        $result = $this->db->conc->query("SELECT * FROM $table where item_id = '$item_id'");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) $resultArray[] = $item;

        return $resultArray;
    }
}