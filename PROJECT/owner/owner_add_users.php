<?php
include '../connection.php';
session_start();
$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}

if (isset($_POST['submit'])) {
    $customer_id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['op1'];
    $password = 'customer123';
    $fees = $_POST['op3'];
    $address = $_POST['address'];
    $phone_no = $_POST['mobile'];
    $dob = $_POST['dob'];

    $select_customer = "SELECT * FROM `customer` WHERE customer_id = '$customer_id'";
    $customer_id_data = mysqli_query($conn, $select_customer);

    if (mysqli_num_rows($customer_id_data) > 0) {
        echo "<script> alert('customer Id alredy Exist');</script>";
    } else {
        $insert_customer = "INSERT INTO `customer` (`customer_id`, `owner_id`, `fname`, `lname`, `gender`, `email`, `password`, `phone_no`,  `dob`, `address`, `fees`) VALUES ('$customer_id', '$owner_id','$fname','$lname','$gender','$email','$password','$phone_no','$dob','$address','$fees')";
        $data = mysqli_query($conn, $insert_customer);
        if ($data) {
            echo "<script> alert('customer Registered successfully');</script>";
        } else {
            echo "<script> alert('failed to add new customer!');</script>";
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $select_customer = "SELECT * FROM `customer` WHERE id='$delete_id'";
    $data = mysqli_query($conn, $select_customer);
    $result = mysqli_fetch_assoc($data);
    unlink($result['customer_img']);

    $delete_customer = "DELETE FROM `customer` WHERE id='$delete_id'";
    $data = mysqli_query($conn, $delete_customer);

    header('location:owner_add_users.php');
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
    <div class="container d-flex justify-content-center">
    <form class="form border border-dark p-5 mt-5 bg-white   w-75" action="#" method="post">
        <div class="col">
            <input type="text" name="id" class="form-control border-dark" required placeholder="customer ID Ex: C101">
        </div><br>
        <div class="col">
            <input type="text" name="fname" class="form-control border-dark" required placeholder="Enter First Name">
        </div>
        <br>
        <div class="col">
            <input type="text" name="lname" class="form-control border-dark" required placeholder="Enter Last Name">
        </div>
        <br>
        <div class="form-group">
            <input type="email" class="form-control border-dark" name="email" required aria-describedby="emailHelp"
                placeholder="Email address : *****@Gmail.com">
        </div>
        <br>

        <div class="form-group row">
            <div class="col">
                <select id="class" name="op1" required class="form-control border-dark">
                    <option selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col">
                <select id="class" name="op3" required class="form-control border-dark">
                    <option selected>Fees status</option>
                    <option value="Paid">Paid</option>
                    <option value="Remaining">Remaining</option>
                </select>
            </div>
        </div>
        <br>

        <div class="form-group row">
            <div class="col">
                <label for="mobile">Mobile Number</label>
                <input type="text" class="form-control border-dark" name="mobile" required placeholder="Enter Mobile Number">
            </div>
            <div class="col">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control border-dark" name="dob" required placeholder="date of birth">
            </div>
        </div>
        <br>

        <div class="form-group">
            <textarea class="form-control border-dark" name="address" placeholder="Enter your address"
                id="exampleFormControlTextarea1" required rows="3"></textarea>
        </div>
        <br>
        <div class="form-check" style="align-items: center; text-align: center;">
            <button type="submit" class="px-4 btn" name="submit"
                style="background-color: rgb(179 65 226 / 63%);">Add</button>
        </div>
    </form>
    </div>
    <!-- insert form end -->
    <div class="container">
        <div class="row row-gap-4">
            <?php
            // include 'conn.php';
            $qry = "select * from customer";
            $res = mysqli_query($conn, $qry) or die('Not found');
            if (mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-3 my-5">
                        <div class="card shadow h-100">
                            <div class="card-body">
                                <div class="id">customer Id:
                                    <?php echo $r['customer_id']; ?>
                                </div>
                                <div class="name">
                                    <?php echo $r['fname'] . " " . $r['lname']; ?>
                                </div>

                                <div class="email">Email :
                                    <?php echo $r['email']; ?>
                                </div>
                                Gender :
                                <?php echo $r['gender']; ?><br>
                                Date of Birth :
                                <?php echo $r['dob']; ?><br>
                                Phone No :
                                <?php echo $r['phone_no']; ?><br>
                                Fees Status :
                                <?php echo $r['fees']; ?><br>
                                Address :
                                <?php echo $r['address']; ?><br><br>
                                <div class="d-flex justify-content-evenly w-75">
                                    <a href="update_customer.php?customer_id=<?= $r['customer_id']; ?>"
                                        class="btn btn-purple">Update</a>
                                    <a href="owner_add_users.php?delete=<?= $r['id']; ?>&customer_id=<?= $r['customer_id'] ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('delete this customer details?');">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </table>
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