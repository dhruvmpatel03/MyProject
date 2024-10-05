<?php
$err='';
$uname=$_POST['username'];
$upass1=$_POST['pass1'];
$upass2=$_POST['pass2'];
$usertype=$_POST['usertype'];

if($upass1!=$upass2){
    echo "Password didn't match";
    die;
}

$cipher_pass=md5($upass1);

$conn=new mysqli("localhost","root","","dhruv");
try{
    mysqli_query($conn,"insert into user(username,password,usertype) value('$uname','$cipher_pass','$usertype')");
   
    echo "REGISTRATION IS SUCCESS";
    header("location:../SHARED/login.html");
}
catch(Exception $e){
    echo "USER NAME ALREADY EXIST";
}

?>