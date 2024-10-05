<html>

<head>
   <style>
    .pdt-card{
        width: 300px;
        height: fit-content;
        background-color: bisque;
        padding: 10px;
        margin: 10px;
        display: inline-block;
    }
    .pdt-img,.pdt-img-wrapper{
        width:100%;
        height: 300px;
    }
    .name{
        font-size: 24px;
        font-weight: bold;
        text-transform: capitalize;
    }
    .price{
        font-size: 24px;
        color: red;
    }
    .detail{
        font-style: italic;
    }
   </style>
</head>
<body>
    
</body>
</html>

<?php

include "authguard.php";
include "menu.HTML";
include "../SHARED/connection.php";


$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userid]");

$total=0;

while($dbrow=mysqli_fetch_assoc($sql_result))
{
     $total+=$dbrow['price'];
   echo " 
       <div class='pdt-card'>
           <div class='name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price] Rs</div>
           <div class='pdt-img-wrapper'>
              <img class='pdt-img' src='$dbrow[impath]'>
           </div>
           <div class='detail'>$dbrow[detail]</div>
           <div class='d-flex justify-content-around'>
        
             <a href='removecartid.php?cartid=$dbrow[cart_id]'>
             <button class='btn btn-danger'>Remove Cart</button>
             </a>
           </div>
       </div>
   ";
   
}
$_SESSION['total_amt']=$total;
echo"<div>

<div class='display-3'>
Total Amount = $total Rs
<a href='placeorder.php'>
<button class='btn btn-secondary p-4'>PLACE ORDER</button>
</a>
</div>

</div>";

?>