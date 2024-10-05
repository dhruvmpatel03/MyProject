<?php
include '../connection.php';
session_start();
$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}

if (isset($_POST['submit'])) {
    $new_image = $_FILES['img']['name'];
    $new_desc = $_POST['des'];
    $name=$_POST['name'];


    $qry = "INSERT INTO `yogasan`(`img`, `des`,`name`) VALUES ('{$new_image}','{$new_desc}','{$name}')";
    $data = mysqli_query($conn, $qry) or die('Not Inserted !!');
    if ($data) {
        echo "<script> alert('yogasan added successfully');</script>";
    } else {
        echo "<script> alert('failed to add new yogasan!');</script>";
    }

    if (isset($_FILES['img'])) {
        echo "<br>";
        $file_name = $_FILES['img']['name'];
        $temp_file = $_FILES['img']['tmp_name'];
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $select_student = "SELECT * FROM `yogasan` WHERE id='$delete_id'";
    $data = mysqli_query($conn, $select_student);
    $result = mysqli_fetch_assoc($data);
    unlink($result['img']);

    $delete_student = "DELETE FROM `yogasan` WHERE id='$delete_id'";
    $data = mysqli_query($conn, $delete_student);
    header('location:owner_add_yoga.php');
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
    <!-- insert form start -->
    <h2 class="text-center">ADD YOGASAN</h2>
    <div class="container d-flex justify-content-center">
        <form class="form border border-dark p-3 mt-2 bg-white   w-75" action="#" method="post"
            enctype="multipart/form-data">
            <div class="form-group mb-2">
                <input type="file" name="img" class="form-control border border-black " required>
            </div>

            <div class="form-group mb-2">
                <input type="text" name="des" class="form-control border border-black " placeholder="description"
                    required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="name" class="form-control border border-black " placeholder=" Yoga Name"
                    required>
            </div>
            <div class="form-check" style="align-items: center; text-align: center;">
                <button type="submit" class="px-4 btn" name="submit"
                    style="background-color: rgb(179 65 226 / 63%);">Add</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row row-gap-4">
            <?php
            $qry = "select * from yogasan";
            $res = mysqli_query($conn, $qry) or die('Not found');
            if (mysqli_num_rows($res) > 0) {
                echo '<h2 class="text-center mt-5">YOGASAN</h2>';
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

                                <a href="owner_add_yoga.php?delete=<?= $r['id']; ?>" class="btn btn-danger" style="width: 43%;margin-left: 40px;" onclick="return confirm('delete this yoga details?');">Delete</a>

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
    <?php include 'footer.php'; ?>

</body>

</html>