<?php

session_start();
session_destroy(); // Make sure session is cleared
?>





<?php
session_start();
include './Common/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action === "login") {

        $email = $_POST["email"];
        $password = $_POST["password"];

        // Step 1: Check in users table (admin)
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $adminResult = $stmt->get_result();

        if ($admin = $adminResult->fetch_assoc()) {
            if ($password === $admin["password"] && $admin["role"] == "admin") {
                $_SESSION["user_id"] = $admin["id"];
                $_SESSION["role"] = "admin";
                header("Location: admin.php");
                exit();
            }
        }

        // Step 2: Check in teachers table
        $stmt = $conn->prepare("SELECT * FROM teachers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $teacherResult = $stmt->get_result();

        if ($teacher = $teacherResult->fetch_assoc()) {
            if ($password === $teacher["password"]) {
                $_SESSION["user_id"] = $teacher["id"];
                $_SESSION["role"] = "teacher";
                header("Location: teacher.php");
                exit();
            }
        }

        // Step 3: Check in students table
        $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $studentResult = $stmt->get_result();

        if ($student = $studentResult->fetch_assoc()) {
            if ($password === $student["password"]) {
                $_SESSION["user_id"] = $student["id"];
                $_SESSION["role"] = "student";
                header("Location: student.php");
                exit();
            }
        }

        // If none matched
        $loginError = "Invalid email or password.";
    }

   
}
?>



<script>
  window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>

<?php include './Common/header.php'; ?>


<body>
    

<div class="container-fluid bg-color p-3 p-sm-5 p-md-5 p-lg-5 d-flex align-items-center justify-content-center gap-3 
flex-md-wrap flex-lg-nowrap row g-0 "  id="main-container">

<div class="container col-lg-6 col-md-12 col-12 text-center p-lg-5 p-0 rounded-3  min-vh-25 max-vh-100 
flex-column d-flex align-items-center justify-content-center">
    <h1 class="text-center text-white mb-1 mb-lg-4 ">Welcome to The Brighten Stars</h1>
    <p class="text-center text-white mb-1 mb-lg-2 ">Your journey to knowledge and growth starts here.</p>
</div>


<div class="container col-12 col-lg-6 col-md-12 p-3 p-lg-5 rounded-3 min-vh-50 max-vh-100  box-color" id="login-container">
    <h1 class="text-center mb-2 text-white ">Login Panel</h1>
    <h6 class="text-white text-center mb-2" >Learn and Grow in safe hands</h6>
<form method="POST" action="index.php" class="text-white p-4  ">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    <div id="emailHelp" class=" text-color">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label ">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
   
  </div>
  <?php if (!empty($loginError)): ?>
    <div class="alert alert-danger alert-div" role="alert ">
        <strong>Error!</strong> <?php echo $loginError; ?>
    </div>
    <?php endif; ?>
<!-- Inside the same form -->
<button type="submit" name="action" value="login" class="btn btn-color">Login</button>


</form>

</div>
</div>



<?php include './Common/footer.php'; ?>




<div class="container-fluid ">
    <div class="container">

        <div class="box1">
            <div class="img-contianer">
                <img src="" alt="">
            </div>
<div class="text-container">
<h2>Teacher</h2>

</div>
</div>

        <div class="box2">
        <div class="img-contianer">
                <img src="" alt="">
            </div>
<div class="text-container">
    <h2>Teacher</h2>
</div>
        </div>


        <div class="box3">
        <div class="img-contianer">
                <img src="" alt="">
            </div>
<div class="text-container">
<h2>Teacher</h2>

</div>
        </div>   
        
        


</div>
</div>
