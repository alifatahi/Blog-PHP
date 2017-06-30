<?php

require "db.php";
require "functions.php";
use Blog\DB;
//Make Connection
$conn = DB\connect($config);
if (!$conn)die('Could not Connect');
