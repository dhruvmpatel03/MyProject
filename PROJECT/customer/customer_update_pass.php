<?php
include '../connection.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
    header('location:customer_login.php');
}
    $select_customer_id = "SELECT * FROM `customer` WHERE id = '$customer_id'";
    $customer_id_data = mysqli_query($conn, $select_customer_id);
    $result_customer_id = mysqli_fetch_assoc($customer_id_data);
    $customer_id = $result_customer_id['customer_id'];

    $default_pass = 'customer123';

    if($result_customer_id['password'] == $default_pass){
        if(isset($_POST['update'])){

        $email = $_POST['email'];
        $fileName = $_FILES['profile_pic']['name'];
        $tempName = $_FILES['profile_pic']['tmp_name'];   
        $folder = '../uploaded_images/'.$fileName; 
        move_uploaded_file($tempName, $folder);

        $empty_pass =" ";
        $select_old_pass = "SELECT password FROM `customer` WHERE customer_id = '$customer_id'";
        $data = mysqli_query($conn, $select_old_pass);

        $result_password = mysqli_fetch_assoc($data);
        $prev_pass = $result_password['password'];

        $old_pass = $_POST['old_password'];
        $new_pass = $_POST['new_password'];
        $confirm_pass =$_POST['new_cpassword'];

        if($old_pass == $empty_pass){
            echo "<script> alert('Please Enter Old Password');</script>";
        }elseif($old_pass != $prev_pass){
            echo "<script> alert('Old Password Not Matched');</script>";
        }elseif($new_pass != $confirm_pass){
            echo "<script> alert('Confirm password Not Matched');</script>";
        }elseif($new_pass == $old_pass){
            echo "<script> alert('This is current password');</script>";
        }else{
            if($new_pass != $empty_pass){
                $update_customer_pass = "UPDATE `customer` SET email = '$email', password = '$confirm_pass', customer_img = '$folder' WHERE customer_id = '$customer_id'";
                $data_change_password = mysqli_query($conn, $update_customer_pass);

                
                echo "<script> alert('Profile Updated Successfully');</script>";
                header('location:customer_home.php');
            }else{
                echo "<script> alert('Please Enter New password');</script>";
            }
        }
    }
        }else{
                header('location:customer_home.php');
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
    <title>Update pass</title>
</head>
<body style=" background-color: rgb(224 193 231);">
<div class="d-flex justify-content-center" style="margin-top: 10%;">
        <form class="border border-black p-3   w-25"  action=""method="post" enctype="multipart/form-data">
            <h3 class="card-header">Update customer</h3><br>
            <input type="hidden" name="prev_password" value="<?php $result_customer_id['password']?>">

            <div class="form-group mb-2">
                <input type="text" name="owner_id" class="form-control border border-black " value="<?php echo $result_customer_id['customer_id']?>" readonly placeholder="Ex : a101" required>
            </div>

            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control border border-black " value="<?php echo $result_customer_id['email']?>" id="email" placeholder="Enter email" required>
            </div>

            <div class="form-group mb-2">
                <input type="file" name="profile_pic" class="form-control border border-black " required>
            </div>

            <div class="form-group mb-2">
                <input type="password" name="old_password" class="form-control border border-black " placeholder="Old Password" required>
            </div>

            <div class="form-group mb-2">
                <input type="password" name="new_password" class="form-control border border-black " placeholder="New Password" required>
            </div>

            <div class="form-group mb-2">
                <input type="password" name="new_cpassword" class="form-control border border-black " placeholder="Confirm New Password" required>
            </div>

            <button type="submit" name="update" class="btn btn-outline-dark">Update Now</button><br>
        </form>
    </div>
</body>
</html>