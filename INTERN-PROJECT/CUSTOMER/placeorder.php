<?php

include "authguard.php";
include "../SHARED/connection.php";

$userid = $_SESSION['userid'];


// Step 1: Read all product info from the cart table using session user id
$sql_r ="select cart.cart_id, product.name, product.price, product.impath, product.detail
from cart 
join product on cart.pid = product.pid 
where cart.userid = $_SESSION[userid]";
$sql_result = $conn->query($sql_r);

// Calculate total amount
$total_amt= $_SESSION['total_amt'];
// Step 2: Create order
$sql_order = "insert into `order`(userid, total_amt) value ('$userid', '$total_amt')";

if ($conn->query($sql_order) === TRUE) {
  $order_id = $conn->insert_id;

    $sql_result = $conn->query($sql_r); // Fetch cart items again to loop through
    while ($dbrow = $sql_result->fetch_assoc()) {
        $product_name = $dbrow['name'];
        $price = $dbrow['price'];
        

      mysqli_query($conn,"insert into order_detail (order_id, product_name, price) 
                             value ('$order_id', '$product_name', '$price')");
   
    }

    // Step 4: Delete cart entries for the user
   mysqli_query($conn,"delete from cart where userid = '$userid'");
   

    echo "Order placed successfully.";
    header("locatoin:")
  }
  else {
    echo "Error creating order: " . $conn->error;
}

?>

