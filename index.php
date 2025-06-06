<?php
session_start();
include './Common/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Plain text password comparison (not secure for production)
        if ($password === $user["password"]) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == "admin") {
                header("Location: admin.php");
                exit();
            } elseif ($user["role"] == "teacher") {
                header("Location: teacher.php");
                exit();
            }
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "No user found.";
    }
}
?>





<?php include './Common/header.php'; ?>


<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    



<div class="container col-6 border p-5 mt-5 ">
    <h2 class="text-center pb-2">The Brighten Stars</h2>
<form method="POST" action="index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<!-- 
<form method="POST" action="index.php">
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
    <button type="submit">Login</button>
</form> -->


<?php include './Common/footer.php'; ?>



