<?php

function view($path,$data = NULL){
    if ($data){
        extract($data);
    }
    include "views/{$path}.view.php";
}


