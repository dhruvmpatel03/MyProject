<?php


include "authguard.php";



$file_name=$_FILES['pdtimg']['name'];
$source_path=$_FILES['pdtimg']['tmp_name'];

$dest_path="../SHARED/images/".$file_name;
echo $dest_path;
move_uploaded_file($source_path,$dest_path);

include "../SHARED/connection.php";
$query="insert into product(name,price,detail,impath,uploaded_by) value('$_POST[name]',$_POST[price],'$_POST[detail]','$dest_path',$_SESSION[userid])";
mysqli_query($conn,$query);
 header("location:home.php");

?>