<?php

include "authguard.php";
$userid=$_SESSION['userid'];

$pid=$_GET['pid'];

include "../SHARED/connection.php";

$status=mysqli_query($conn,"insert into cart(userid,pid) value($userid,$pid)");

if($status){
    echo "Added to cart successfully";
    header("location:home.php");
}
else{
    echo "mysqli_error($conn)";
}

?>