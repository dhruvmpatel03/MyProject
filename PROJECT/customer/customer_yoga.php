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
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="text-center mt-3">
            <h1> YOGA POSE </h1>
            <p>We Are Here To Teach You Yoga :)</p>
        </div>
        <div class="container">
        <div class="row row-gap-4">
            <?php
            $qry = "select * from yogasan";
            $res = mysqli_query($conn, $qry) or die('Not found');
            if (mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-3 my-2">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <img class="card-img-top" src="../uploaded_images/<?php echo $r['img'] ?>" alt="">
                                <div class="email"><span class="fw-bold">Yoga Name :</span>
                                    <?php echo $r['name'] ?>
                                </div>
                                <div class="email"><span class="fw-bold">Description :</span>
                                    <?php echo $r['des'] ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <?php
            } else {
                echo "No data found";
            }
            ?>
        </div>
    </div>
        </div>


    <?php include '../owner/footer.php'; ?>
</body>

</html>