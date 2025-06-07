<?php
session_start();
include './Common/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

       $action = $_POST["action"];
        if ($action === "login") {
            // login logic
   

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
            $passwordError = "Wrong password.";
        }
    } else {
        $emailError = "No user found.";
    }
         } 
         elseif ($action === "signup") {
            // redirect to signup or handle it here
            header("Location: signup.php");
            exit();
        }
    
    }
   
?>





<?php include './Common/header.php'; ?>


<body>
    

<div class="container-fluid bg-color p-5 d-flex align-items-center justify-content-center gap-3 
flex-md-wrap flex-lg-nowrap row g-0"  id="main-container">

<div class="container col-lg-6 col-md-12 col-12 text-center p-5 p-md-2 p-sm-0 rounded-3  min-vh-25 max-vh-100 
flex-column d-flex align-items-center justify-content-center">
    <h1 class="text-center text-white mb-4">Welcome to The Brighten Stars</h1>
    <p class="text-center text-white mb-2">Your journey to knowledge and growth starts here.</p>
</div>


<div class="container col-12 col-lg-6 col-md-12 p-5 rounded-3 min-vh-50 max-vh-100  box-color" id="login-container">
    <h1 class="text-center mb-2 text-white ">Login Panel</h1>
    <h6 class="text-white text-center mb-2" >Learn and Grow in safe hands</h6>
<form method="POST" action="index.php" class="text-white p-4  ">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php if (!empty($emailError)): ?>
      <small class="alert-color"><?php echo $emailError; ?></small>
    <?php endif; ?>
    <div id="emailHelp" class=" text-color">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label ">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <?php if (!empty($passwordError)): ?>
      <small class="alert-color"><?php echo $passwordError; ?></small>
    <?php endif; ?>
  </div>
 
<!-- Inside the same form -->
<button type="submit" name="action" value="login" class="btn btn-color">Login</button>
<button type="submit" name="action" value="signup" class="btn btn-color">Sign Up</button>


</form>

</div>
</div>




<?php include './Common/footer.php'; ?>



