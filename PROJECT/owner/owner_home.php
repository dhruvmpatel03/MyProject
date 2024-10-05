<!DOCTYPE html>
<?php
include '../connection.php';
session_start();

$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}
$select_profile = "SELECT * FROM `owner` WHERE id = '$owner_id'";
$data = mysqli_query($conn, $select_profile);

$result = mysqli_fetch_assoc($data);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
    <title>owner home</title>
    <style>
        .head {
            margin-left: 610px;
            font-weight: 500;
        }
        body{
            background-color: rgb(224 193 231);
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="text-center mt-5">
        <h1 style="color: rgb(69 1 69 / 63%);">
            JO HOGA YOGA SE HOGA....
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex justify-content-center my-5">
                <div class="card shadow border border-dark w-100 text-center py-4" style="width: 18rem;">
                    <div class="card-body">
                        <h3>Welcome!</h3>
                        <p class="card-text fs-3">
                            <?php echo $result['name']; ?>
                        </p>
                        <a href="owner_edit.php" class="btn" style="background-color: rgb(179 65 226 / 63%);">Update</a>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center my-5">
                <div class="card shadow border border-dark w-100 text-center py-4" style="width: 18rem;">
                    <div class="card-body">
                        <?php
                        $select_customer = "SELECT * FROM `customer`";
                        $data = mysqli_query($conn, $select_customer);

                        $total_customer = mysqli_num_rows($data);
                        ?>
                        <h3>Total customer</h3>
                        <h3 class="card-text fs-1">
                            <?php echo $total_customer; ?>
                        </h3>
                        <a href="owner_add_users.php" class="btn" style="background-color: rgb(179 65 226 / 63%);">See customer</a>
                    </div>
                </div>
            </div>
            

            <div class="col-4 d-flex justify-content-center my-5">
                <div class="card shadow border border-dark w-100 text-center py-4" style="width: 18rem;">
                    <div class="card-body">
                        <?php
                        $select_customer = "SELECT * FROM `diet`";
                        $data = mysqli_query($conn, $select_customer);

                        $total_customer = mysqli_num_rows($data);
                        ?>
                        <h3>Total Diets</h3>
                        <h3 class="card-text fs-1">
                            <?php echo $total_customer; ?>
                        </h3>
                        <a href="owner_diet.php" class="btn" style="background-color: rgb(179 65 226 / 63%);">See Diets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>