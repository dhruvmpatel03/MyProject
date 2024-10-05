<?php
include '../connection.php';
session_start();
$main_owner_id = $_SESSION['owner_id'];


if(!isset($main_owner_id)){
    header('location:owner_login.php');
}

    $select_owner_id = "SELECT * FROM `owner` WHERE id = '$main_owner_id'";
    $owner_id_data = mysqli_query($conn, $select_owner_id);
    $result_owner_id = mysqli_fetch_assoc($owner_id_data);
    $owner_id = $result_owner_id['owner_id'];

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $empty_pass = " ";
    $select_old_pass = "SELECT password FROM `owner` WHERE owner_id = '$owner_id'";
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
            $update_owner_pass = "UPDATE `owner` SET name = '$name', email = '$email', password = '$confirm_pass' WHERE owner_id = '$owner_id'";
            $data_change_password = mysqli_query($conn, $update_owner_pass);
            echo "<script> alert('Profile Updated Successfully');</script>";
                header('location:owner_home.php');
            }else{
                echo "<script> alert('Please Enter New password');</script>";
            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
     
<head>
    <title>Update owner</title>
</head>


<body style=" background-color: rgb(224 193 231);">



    <div class="d-flex justify-content-center" style="margin-top: 10%;">
        <form class="border border-black p-3   w-25"  action="" method="post">
        <input type="hidden" name="prev_password" value="<?php echo $result_owner_id['password']; ?>"readonly>

            <h3 class="card-header">Update Profile</h3><br>
            <div class="form-group mb-2">
                <input type="text" name="owner_id" class="form-control border border-black " value='<?php echo $result_owner_id["owner_id"]; ?>' required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="name" class="form-control border border-black" id="password" value="<?php echo $result_owner_id['name']; ?>" required>
            </div>
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control border border-black "  value="<?php echo  $result_owner_id['email']; ?>"required>
            </div>
            <div class="form-group mb-2">
                <input type="password" placeholder="Old Password" name="old_password" class="form-control border border-black " required>
            </div>
            <div class="form-group mb-2">
                <input type="password" placeholder="New Password" name="new_password" class="form-control border border-black " required>
            </div>
            <div class="form-group mb-2">
                <input type="password" placeholder="Confirm Password" name="new_cpassword" class="form-control border border-black " required>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" name="update" class="btn" style="background-color: rgb(179 65 226 / 63%);">Update</button><br>
            </div>
        </form>
</body>

</html>