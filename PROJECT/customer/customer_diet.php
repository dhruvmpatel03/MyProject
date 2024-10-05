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
        <div class="row row-gap-4">
            <?php
            $select_diet = "SELECT * FROM `diet`";
            $data = mysqli_query($conn, $select_diet);

            $total = mysqli_num_rows($data);

            if ($total > 0) {    
                echo '<h2 class="text-center pt-5"> DAYOGA DIET</h2>';
                while ($fetch_diet = mysqli_fetch_assoc($data)) {
                    ?>
                    <div class="col-3">
                        <div class="card shadow h-100 border border-dark">
                            <div class="card-body">
                                <div class="id"><span class="fw-bold">owner Id : </span>
                                    <?php echo $fetch_diet['owner_id']; ?>
                                </div>
                                <div class="name"><span class="fw-bold">Title : </span>
                                    <?php echo $fetch_diet['name']; ?>
                                </div>
                                <span class="fw-bold">Description : </span>
                                <?php echo $fetch_diet['content']; ?><br>
                                <span class="fw-bold">Date : </span>
                                <?php echo $fetch_diet['issue_date']; ?><br>
                                <div class="my-flex-btn">
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </table>
                <?php
            } else {
               
            }
            ?>
        </div>
    </div>
    <?php include '../owner/footer.php'; ?>
</body>

</html>