<?php
require "functions.php";
use Blog\DB;
//Make Connection
$conn = DB\connect($config);
if (!$conn)die('Could not Connect');

$post = DB\query('SELECT * FROM posts WHERE id = :id LIMIT 1',
            array('id' => $_GET['id']),$conn);

if ($post){
    $post = $post[0];
    $view_path = 'views/single.view.php';
    include "views/layout.php";
}else{
    header('Location:index.php');
}

