<?php
include '../connection.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
    header('location:customer_login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
    <title>customer home</title>
</head>

<body style=" background-color: rgb(224 193 231);">
    <nav class="py-2" style="background-color: rgb(18, 18, 18);">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="customer_home.php" class=" text-light nav-link link-info px-2">Home</a></li>
                <li class="nav-item"><a href="customer_profile.php" class=" text-light nav-link link-info px-2">Profile</a></li>
                <li class="nav-item"><a href="#" class=" text-light nav-link link-info px-2">Update Profile</a></li>
                <li class="nav-item"><a href="customer_diet.php" class=" text-light nav-link link-info px-2">diet</a></li>
            </ul>
            <ul class="nav">
                <form action="customer_logout.php" method="post">
                    <input class=" text-light border border-light   mx-1 px-3 nav-link link-info px-2" type="submit" value="Logout">
                </form>
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom" style="background-color: rgb(62, 62, 62);">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="#"
                class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-info text-decoration-none">
                <span class="fs-4 text-light">customer</span>
            </a>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
        </div>
    </header>
</body>

</html>