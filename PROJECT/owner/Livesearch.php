<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../css/bootstrapjs.js"></script>
     
</head>  

<body>

</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "yoga");
$response = "";
$response .= "<table class='table table-dar table-striped' border=1>";
$str = $_GET['q'];
$sql = "select * from customer where 
fname like '%$str%' or lname like '%$str%' or customer_id like '%$str%' or 
phone_no like '%$str%' or address like '%$str%'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($res)) {
    $response .= "<tr>";
    for ($i = 0; $i < 10; $i++) {
        $response .= "<td>$row[$i]</td>";
    }
    $response .= "</tr>";
}
$response .= "</table>";
echo $response;
?>