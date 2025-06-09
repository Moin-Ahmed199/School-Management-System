<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies


if ($_SESSION["role"] !== "student") {
    header("Location: index.php");
    exit();
}
?>