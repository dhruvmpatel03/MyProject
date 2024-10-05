<?php
include '../connection.php';
session_start();

$owner_id = $_SESSION['owner_id'];

if (!isset($owner_id)) {
    header('location:owner_login.php');
}
$a=$_GET['id'];
$qry="delete from complaint where id={$a}";
mysqli_query($conn,$qry);
header('location:owner_all_complaint.php');
?>