<?php
include '../connection.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['customer_email'];
    $password = $_POST['customer_password'];
    $result = mysqli_query($conn, "SELECT * FROM `customer` WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    $alert='<div class="alert alert-danger" role="alert">Incorrect Password</div>';
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
                $_SESSION["customer_id"] = $row["id"];
                header("location: ../CUSTOMER/customer_update_pass.php");
        }else {
            echo "<script> alert('Incorrect password');</script>";
        }
    } else {
        echo "<script> alert('not registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
    <title>customer</title>
</head>

<body style="background-color: rgb(224 193 231);">
<a href="../SHARED/HOME.PHP"> <button type="HOME" name="HOME" class="btn mt-2 w-100 fw-bold" style="background-color: rgb(179 65 226 / 63%);">
Home   </button></a>
    <div class="d-flex justify-content-center" style="margin-top: 10%;" >
        <form class="bg-light shadow border border-black p-3 w-25"  method="post">
            <h3 class="card-header">customer login</h3><br>
            <h6>default password : customer123</h6>
            <div class="form-group mb-2">
                <label for="email">Email address</label>
                <input type="email" class="form-control border border-black " required name="customer_email" id="email" aria-describedby="email"
                    placeholder="Enter email">
                
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" class="form-control border border-black" name="customer_password" id="password" required placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn" style="background-color: rgb(179 65 226 / 63%);">login</button>
            
        </form>
    </div>

</body>

</html>