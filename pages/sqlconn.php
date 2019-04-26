<?php

function test_in($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$db= new PDO('mysql:host=localhost;dbname=webdb;','root','');

?>