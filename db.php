<?php
namespace Blog\DB;

$config = array(
    'username' => 'root',
    'password' => '123',
    'database' => 'blog'
);

/*
 * Connection Method
 */
function connect($config){
    try{
        $conn = new \PDO('mysql:host=localhost;dbname='.$config['database'],
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
    $stmt->execute($binding);
    return ($stmt->rowCount() > 0) ? $stmt : false;

}

/**
 * @param $tableName
 * @param $conn
 * @return bool
// * Method to Select Table
 */
function get($tableName,$conn,$limit = 10){
    try{
        $result = $conn->query("SELECT * FROM $tableName ORDER BY id DESC LIMIT $limit");
        return($result->rowCount() > 0) ? $result : false;
    }catch (\Exception $e){
        return false;
    }
}

/**
 * @param $id
 * @param $conn
 * @return mixed
 */
function get_by_id($id,$conn){
    $query = query(
        'SELECT * FROM posts WHERE id = :id LIMIT 1',
        array('id' => $id),
        $conn);
    if ($query) return $query->fetchAll();
}

?>




