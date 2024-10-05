<?php
include '../connection.php';
session_start();

$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}

if (isset($_POST['add_diet'])) {

    $select_owner = "SELECT * FROM `owner` WHERE id= '$owner_id'";
    $data = mysqli_query($conn, $select_owner);
    $result = mysqli_fetch_assoc($data);

    $main_owner_id = $result['owner_id'];

    // $for_whom = $_POST['for_whom'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('y-m-d h:i:s');

    if ($name == "" || $content == "") {
        echo "<script> alert('please, Fill all fields details!');</script>";
    } else {
        $query = "INSERT INTO `diet`(owner_id, name, content, issue_date) VALUES ('$main_owner_id', '$name', '$content', '$date')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<script> alert('diet add successfully');</script>";
        } else {
            echo "<script> alert('Not upload diet');</script>";
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_diet = "DELETE FROM `diet` WHERE id='$delete_id'";
    $data = mysqli_query($conn, $delete_diet);
    header('location:owner_diet.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
     
    <title>owner home</title>
</head>

<body style=" background-color: rgb(224 193 231);">
<?php include 'navbar.php'; ?>
    <div class="d-flex justify-content-center mt-4">
        <form class="border bg-light shadow border-black p-3 w-25"
            action="" method="post">
            <h3 class="card-header">Add New Diet</h3><br>
            <div class="col">
                <input type="text" name="name" class="form-control border border-dark" required placeholder="Diet Name">
            </div><br>
            <div class="form-group">
                <textarea class="form-control border border-dark" name="content" placeholder="Enter Ingredients"
                    id="exampleFormControlTextarea1" required rows="3"></textarea>
            </div>
            <button type="submit" name="add_diet" class="btn mt-3 w-100" style="background-color: rgb(179 65 226 / 63%);">Add</button><br>
        </form>
    </div>
    <div class="container">
        <div class="row row-gap-4">
            <?php
            $select_diet = "SELECT * FROM `diet`";
            $data = mysqli_query($conn, $select_diet);

            $total = mysqli_num_rows($data);

            if ($total > 0) {    
                echo '<h2 class="text-center pt-5">DAYOGA DIET </h2>';
                while ($fetch_diet = mysqli_fetch_assoc($data)) {
                    ?>
                    <div class="col-4">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <div class="id">owner Id:
                                    <?php echo $fetch_diet['owner_id']; ?>
                                </div>
                                <div class="name">Title :
                                    <?php echo $fetch_diet['name']; ?>
                                </div>
                                Description :
                                <?php echo $fetch_diet['content']; ?><br>
                                Date :
                                <?php echo $fetch_diet['issue_date']; ?><br>
                                <div class="my-flex-btn">

                                    <a href="owner_diet.php?delete=<?= $fetch_diet['id']; ?>" class="btn btn-danger"
                                        onclick="return confirm('delete this diet?');">delete</a>
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
    <?php include 'footer.php'; ?>

</body>

</html>
<!-- navbar end -->