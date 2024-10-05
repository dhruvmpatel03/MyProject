<?php
include '../connection.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $result = mysqli_query($conn, "SELECT * FROM `owner` WHERE name = '$email' or email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
                $_SESSION["owner_id"] = $row["id"];
                header("location:../owner/owner_home.php");
        }else {
            echo "<script> alert('Password does not Match');</script>";
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
    <title>owner</title>
</head>

<body style="background-color: rgb(224 193 231);">
   
<a href="../SHARED/HOME.PHP"> <button type="HOME" name="HOME" class="btn mt-2 w-100 fw-bold" style="background-color: rgb(179 65 226 / 63%);">
Home   </button></a>
    <div class=" d-flex justify-content-center" style="margin-top: 10%;">
        <form class="bg-light shadow p-3 border border-dark" style="width:20%;" action=""
            method="post">
            <h3 class="card-header">Owner Login</h3>
            <div class="form-group mb-2 mt-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control border border-black " id="email" aria-describedby="email"
                    placeholder="Enter email: owner@gmail.com" required>
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="pass" class="form-control border border-black" id="password" placeholder="Password: 1234" required>
            </div>
            <button type="submit" name="login" class="btn mt-2 w-100 fw-bold" style="background-color: rgb(179 65 226 / 63%);">login</button>
        </form>
       
    </div>
   
</body>

</html>