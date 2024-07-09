<?php

class cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->conc)) {
            return null;
        }
        $this->db = $db;
    }

    public function addToCart($user_id, $item_id)
    {
        if (isset($user_id) && isset($item_id)) {
            $params = array(
                'user_id' => $user_id,
                'item_id' => $item_id
            );
            $result = $this->insertIntoCart($params);
            if ($result) {
                header('location:' .$_SERVER["PHP_SELF"]);
            }
        }
    }

    // to get user_id and item_id and insert into cart table

    public function insertIntoCart($params = null, $table = 'cart')
    {
        if ($this->db->conc != null) {
            if ($params != null) {
                //get table columns
                $columns = implode(', ', array_keys($params));

                $values = implode(', ', array_values($params));

                $query = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                $result = $this->db->conc->query($query);
                return $result;
            }
        }
    }


    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $result = $this->db->conc->query("DELETE FROM $table WHERE item_id = '$item_id'");
            if ($result){
                header('location:' .$_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }
    public function getSum($arr)
    {
        if (isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    public  function getCartID($cartArray = null, $key = 'item_id')
    {
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use ($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart') {
        if ($item_id != null) {
            $query = "INSERT INTO $saveTable SELECT * FROM $fromTable WHERE item_id=$item_id;";
            $query .= "DELETE FROM $fromTable WHERE item_id=$item_id;";

            // execute multiple query
            if ($this->db->conc->multi_query($query)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                // Log error message if the query fails
                error_log("Error executing multi query: " . $this->db->conc->error);
                echo "Error: " . $this->db->conc->error;
            }
        }
        return false;
    }

}