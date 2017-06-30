<?php
require 'blog.php';
use Blog\DB;

$posts = DB\get('posts',$conn);

view('index',array('posts' => $posts));
