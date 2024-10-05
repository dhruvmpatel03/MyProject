<header class="p-3">
    <div class="container p-3" style="background-color: rgb(179 65 226 / 63%);">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h1 class="mx-4">DAYOGA</h1>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="customer_home.php" class="fs-4 nav-link px-2 text-dark fw-bold">Home</a></li>
                <li><a href="contect_us.php" class="fs-4 nav-link px-2 text-dark fw-bold">Contact</a></li>
                <li><a href="customer_diet.php" class="fs-4 nav-link px-2 text-dark fw-bold">Diet</a></li>
                <li><a href="customer_yoga.php" class="fs-4 nav-link px-2 text-dark fw-bold">Yoga</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" onkeyup="showResult(this.value)"
                    class="form-control form-control-dark text-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <form action="../SHARED/customer_logout.php" method="post">
                    <button type="submit" class="btn btn-outline-dark me-2" >Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
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