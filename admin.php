<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

</head>
<body>
    
<!-- Navbar -->

<!-- Navbar -->


<h1 class="text-center">admin page</h1>




<?php
session_start();
if ($_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit();
}
echo "Welcome, Admin!";
?>
<a href="logout.php">Logout</a>



<script src="js/mdb.min.js"></script>
</body>
</html>