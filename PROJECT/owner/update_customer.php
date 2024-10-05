<?php
include '../connection.php';
session_start();

$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}
$customer_id = $_GET['customer_id'];
$select_customer = "SELECT * FROM `customer` WHERE customer_id = '$customer_id'";
$customer_id_data = mysqli_query($conn, $select_customer);
$result = mysqli_fetch_assoc($customer_id_data);

if (isset($_POST['update'])) {
        
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $fees = $_POST['fees'];

    $full_name = $fname." ".$lname;

    $update_customer = "UPDATE `customer` SET fees = '$fees' WHERE customer_id = '$customer_id'";
    $data = mysqli_query($conn, $update_customer);

    if($data){
        echo "<script> alert('Data Updated successfully');</script>";
        header('location:owner_add_users.php');
    }else{
        echo "<script> alert('Failed to Update data');</script>";
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
     
    <title>Update customer details</title>
</head>

<body style="background-color: rgb(224 193 231);">
    <div class="d-flex justify-content-center" style="margin-top: 10%;">
        <form class="border bg-light border-black p-3   w-25"  action=""
            method="post">
            <div class="form-group mb-2">
                <input type="text" name="owner_id" class="form-control border border-black " readonly
                    value='<?php echo $result["customer_id"]; ?>' required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="name" class="form-control border border-black" id="password" readonly
                    value="<?php echo $result["fname"]; ?>" required>
            </div>
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control border border-black " readonly
                    value="<?php echo $result["lname"]; ?>" required>
            </div>
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control border border-black " readonly
                    value="<?php echo $result["email"]; ?>" required>
            </div>
            <div class=" row">
            <div class="col">
                <select id="class" name="fees" required class="form-control form-group border border-dark">
                <option value="Not Selected">Select Fees Status</option>
                <option value="Remaining" <?php
                    if($result['fees'] == 'Remaining'){
                        echo "selected";
                    }
                ?>>Remaining</option>
                <option value="Paid" <?php
                    if($result['fees'] == 'Paid'){
                        echo "selected";
                    }
                ?>>Paid</option>
                </select>
            </div>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" name="update" class="btn mt-2" style="background-color: rgb(179 65 226 / 63%);">Update</button><br>
            </div>
        </form>
    </div>
</body>

</html>