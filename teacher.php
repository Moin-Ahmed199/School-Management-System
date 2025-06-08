




<?php include './Common/header.php'; ?>
    
<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies


if ($_SESSION["role"] !== "teacher") {
    header("Location: index.php");
    exit();
}

?>




<h1 class="text-center">teacher page</h1>

<?php echo "Welcome {$_SESSION['role']}";
?>
<a href="logout.php">Logout</a>


<?php include './Common/footer.php'; ?>