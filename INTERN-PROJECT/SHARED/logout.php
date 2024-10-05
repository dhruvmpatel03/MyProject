<?php

session_start();
session_destroy();

header("location:../SHARED/login.html");

?>