<?php

$cartid=$_GET['cartid'];
include "authguard.php";
include "../SHARED/connection.php";

$status=mysqli_query($conn,"delete from cart where cart_id=$cartid");

if($status){
    echo "Cart iem removed";
    header("location:viewcart.php");
}
else{
    mysqli_error($conn);
}



?>
