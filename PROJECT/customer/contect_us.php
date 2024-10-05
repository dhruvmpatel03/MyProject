<?php
include '../connection.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
    header('location:customer_login.php');
}
?>

<?php
if (isset($_POST['submit'])) {
    $name1 = $_POST['fname'];
    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $number = $_POST['number'];
    $msg = $_POST['msg'];
    $qry = "INSERT INTO `complaint` (`customer_id`, `name`, `description`) VALUES ('$name1', '$name', '$msg')";
    // echo $qry;
    mysqli_query($conn, $qry) or die('insertion failed');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Frame works/bootstrap.min.css">
    <link rel="icon" href="Imgs/Logo/Sleeping.png" type="image/x-icon">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <title>document</title>
</head>

<body style=" background-color: rgb(224 193 231);">

    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->

    <div class="container  -3 theme my-5 px-4 py-5 text-center" id="Contact-Us">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="pink font-weight-bold h3">Get In Touch</h4>
            <h4 class="display-4 font-weight-bold">Email Us For Any Query or Complaint</h4>
        </div>
        <div class="row px-3 pb-2">
            <div class="col-sm-4 text-center mb-3">
                <i class="fa fa-2x fa-map-marker-alt mb-3 pink"></i>
                <h4 class="font-weight-bold">Address</h4>
                <p>123 Street, sarathana surat</p>
            </div>
            <div class="col-sm-4 text-center mb-3">
                <i class="fa fa-2x fa-phone-alt mb-3 pink"></i>
                <h4 class="font-weight-bold">Phone</h4>
                <p>+012 345 67890</p>
            </div>
            <div class="col-sm-4 text-center mb-3">
                <i class="far fa-2x fa-envelope mb-3 pink"></i>
                <h4 class="font-weight-bold">Email</h4>
                <p>dayoga@gmail.com</p>
            </div>
        </div>

        <div class="row">
            <div class="d-felx w-50 m-auto">
                <div class="p-3 bg-light pt-3 border border-dark   mb-2">
                    <div class="contact-form">
                        <form name="f1" id="contactForm" action="" novalidate="novalidate" method="post">
                            <div class="control-group">
                                <input type="text" class="form-control border border-secondary" name="fname"
                                    placeholder="Your Id" value="<?php echo $customer_id?>" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control border border-secondary" name="name"
                                    placeholder="Your Complaint Name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <!-- <div class="control-group">
                                <input name="email" type="email" class="form-control border border-secondary" id="email"
                                    placeholder="Your Email" />
                                <p class="help-block text-danger"></p>
                            </div> -->
                            <!-- <div class="control-group">
                                <input name="number" type="text" class="form-control border border-secondary"
                                    id="number" placeholder="Your mobile Number" />
                                <p class="help-block text-danger"></p>
                            </div> -->
                            <div class="control-group">
                                <textarea name="msg" class="form-control border border-secondary" rows="6" id="message"
                                    placeholder="Discribe Your-Query or complaint"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div style="margin: auto; width: 10%;">
                                <input value="Submit" name="submit" class="btn"
                                    style="background-color: rgb(179 65 226 / 63%);" type="submit"
                                    id="sendMessageButton">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    <!-- contact us end -->

    <?php include '../owner/footer.php'; ?>
</body>

</html>