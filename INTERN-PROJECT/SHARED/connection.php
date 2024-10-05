<?php

$conn=new mysqli("localhost","root","","dhruv");
if($conn->connect_error){
    echo "Sql connection is failed";
    die;
}

?>