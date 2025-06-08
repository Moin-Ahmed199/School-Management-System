<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies


if ($_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit();
}
?>

<?php include './admin assests/header.php'; ?>

<div class="row d-flex flex-row h-100 gap-0">
<?php include './Common/sidebar.php'; ?>

<div class="container col-9 p-0 ">

</div>

</div>









