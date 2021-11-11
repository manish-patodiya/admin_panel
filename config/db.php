<?php
$con = mysqli_connect("localhost", "root", "") or die("connection failed");
mysqli_select_db($con, 'adminpanel') or die("failed connection with db");