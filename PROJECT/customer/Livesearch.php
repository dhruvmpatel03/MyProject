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
$sql = "select * from diet where 
id like '%$str%' or owner_id like '%$str%' or name like '%$str%' or 
content like '%$str%' or issue_date like '%$str%'";
$res = mysqli_query($conn, $sql);
echo '<div class="row">';
while ($row = mysqli_fetch_array($res)) {
    echo '<div class="col-3">
    <div class="card shadow h-100 border border-dark">
        <div class="card-body">
            <div class="id"><span class="fw-bold">owner Id : </span>
            '.$row['owner_id'].'
            </div>
            <div class="name"><span class="fw-bold">Title : </span>
            '.$row['name'].'
            </div>
            <span class="fw-bold">Description : </span>'.$row['content'].'
            <div class="1row"></div><br>
            <span class="fw-old">Date : </span>
            '.$row['issue_date'].'<br>
            <div class="my-flex-btn">
            </div>
        </div>
    </div>
</div>';
}
$response .= "</table>";
echo $response;
?>