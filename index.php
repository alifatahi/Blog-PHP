<?php
require "functions.php";
use Blog\DB;
//Make Connection
$conn = DB\connect($config);
if (!$conn)die('Could not Connect');

$posts = DB\get('posts',$conn);

$view_path = 'views/index.view.php';
include "views/layout.php";