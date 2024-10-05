<?php


include "authguard.php";
include "menu.HTML";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <div class="d-flex justify-content-center align-items-center vh-100">
   <form action="upload.php" method="post" class="w-50 bg-warning p-4" enctype="multipart/form-data">
<h3 class="text-center">Upload Product Here..</h3>
    <input name="name" class="form-control mt-2" type="text" placeholder="Product Name">
    <input name="price" class="form-control mt-2" type="number" placeholder="Product Price">
    <textarea name="detail" rows="5" class="form-control mt-2" placeholder="Product Description"></textarea>
    <input accept=".jpg,.png"name="pdtimg" class="form-control mt-2" type="file">
    <div class="text-center">
    <button class="mt-3 btn btn-success">Upload</button>
   </div>
</form>
   </div>
</body>
</html>