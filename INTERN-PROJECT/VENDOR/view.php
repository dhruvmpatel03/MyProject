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

$sql_result=mysqli_query($conn,"select * from product where uploaded_by=$_SESSION[userid]");

while($dbrow=mysqli_fetch_assoc($sql_result))
{
   echo " 
       <div class='pdt-card'>
           <div class='name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price] Rs</div>
           <div class='pdt-img-wrapper'>
              <img class='pdt-img' src='$dbrow[impath]'>
           </div>
           <div class='detail'>$dbrow[detail]</div>
           <div class='d-flex justify-content-around'>
              <button class='btn btn-primary'>Edit</button>
              <button class='btn btn-danger'>Delete</button>
           </div>
       </div>
   ";
   
}

?>