<?php
namespace Blog\DB;

$config = array(
    'username' => 'root',
    'password' => '123'
);

/*
 * Connection Method
 */
function connect($config){
    try{
        $conn = new \PDO('mysql:host=localhost;dbname=blog',
                        $config['username'],
                        $config['password']);
        $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch (\Exception $e){
        return false;
    }
}


/**
 * @param $query
 * @param $binding
 * @param $conn
 * Query Runner
 */
function query($query,$binding,$conn){
    $stmt =  $conn->prepare($query);
    $stmt->execte($binding);
    $result = $stmt->fetchAll();

    return $result ? $result : false;
}

/**
 * @param $tableName
 * @param $conn
 * @return bool
 * Method to Select Table
 */
function get($tableName,$conn){
    try{
        $result = $conn->query("SELECT * FROM $tableName");
        return($result->rowCount() > 0) ? $result : false;
    }catch (\Exception $e){
        return false;
    }
}

?>




