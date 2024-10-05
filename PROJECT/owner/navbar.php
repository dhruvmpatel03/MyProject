<header class="p-3">
    <div class="container p-3" style="background-color: rgb(179 65 226 / 63%);">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h1 class="mx-4">DAYOGA</h1>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="owner_home.php" class="fs-4 nav-link px-2 text-dark fw-bold">Home</a></li>
                <!-- <li><a href="owner.php" class="fs-4 nav-link px-2 text-dark fw-bold">Owner</a></li> -->
                <li><a href="owner_add_users.php" class="fs-4 nav-link px-2 text-dark fw-bold">Customer</a></li>
                <li><a href="owner_diet.php" class="fs-4 nav-link px-2 text-dark fw-bold">Diet</a></li>
                <li><a href="owner_add_Yoga.php" class="fs-4 nav-link px-2 text-dark fw-bold">Yoga</a></li>
                <li><a href="owner_all_complaint.php" class="fs-4 nav-link px-2 text-dark fw-bold">Complaints</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" onkeyup="showResult(this.value)"
                    class="form-control form-control-dark text-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <form action="../SHARED/owner_logout.php" method="post">
                    <button type="submit" class="btn btn-outline-dark me-2" >Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>


<!-- 
<nav class="py-2">
    <div class="container d-flex flex-wrap">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item"><a href="owner_home.php" class=" text-light nav-link link-info px-2">Home</a></li>
            <li class="nav-item"><a href="owner.php" class=" text-light nav-link link-info px-2">owner</a></li>
            <li class="nav-item"><a href="owner_add_users.php" class=" text-light nav-link link-info px-2">customer</a>
            </li>
            <li class="nav-item"><a href="owner_diet.php" class=" text-light nav-link link-info px-2">diet</a></li>
        </ul> -->
        <!-- <ul class="nav">
            <li class="nav-item">
                <form action="owner_logout.php" method="post">
                    <input class=" text-light border border-light   mx-1 px-3 nav-link link-info px-2"
                        type="submit" value="Logout">
                </form>
            </li>
        </ul> -->
    <!-- </div>
</nav>
<header class="py-3 mb-4 border-bottom" style="background-color: rgb(62, 62, 62);">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-info text-decoration-none">
            <span class="fs-4 text-light">owner</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
            <input type="search" class="form-control" onkeyup="showResult(this.value)" placeholder="Search...">
        </form>
    </div>
</header> -->
<div class="container">
    <div id="disp_area"></div>
</div>
<script>
    function showResult(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("disp_area").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "Livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
</script>