<?php include './admin assests/header.php'; ?>
<div class="row d-flex flex-row flex-wrap vh-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<div class="container-fluid col-10 d-flex align-items-start justify-content-center 
flex-md-wrap flex-lg-nowrap row g-0 p-2" id="main-container">

<div class="container col-lg-10 p-3 p-lg-5 rounded-3 box-color mt-5" id="login-container">
<button class="btn btn-color col-2" onclick="window.location.href='teacher.php';">
  Go Back
</button>
<h1 class="text-center mb-2 text-white">Add new Teacher</h1>
<h6 class="text-white text-center mb-2">Learn and Grow in safe hands</h6>

<!-- Form -->
<form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="text-white">

  <!-- Teacher Name & Email -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="name" class="form-label">Teacher Name</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" name="email" class="form-control" id="email">
    </div>
  </div>

  <!-- Password & Salary -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="text" name="password" class="form-control" id="password">
    </div>
    <div class="col-md-6">
      <label for="salary" class="form-label">Salary</label>
      <input name="salary" class="form-control" id="salary">
    </div>
  </div>

  <!-- Joining Date & Phone -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="joining_date" class="form-label">Joining Date</label>
      <input type="date" name="joining_date" class="form-control" id="joining_date">
    </div>
    <div class="col-md-6">
      <label for="candidate_phone" class="form-label">Teacher Phone No</label>
      <input type="text" name="candidate_phone" class="form-control" id="candidate_phone">
    </div>
  </div>

  <!-- Qualification & Specialization -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="qualification" class="form-label">Qualification</label>
      <input type="text" name="qualification" class="form-control" id="qualification">
    </div>
    <div class="col-md-6">
      <label for="specialization" class="form-label">Specialization</label>
      <input type="text" name="specialization" class="form-control" id="specialization">
    </div>
  </div>

  <!-- Gender -->
  <div class="mb-3">
    <label class="form-label">Gender</label>
    <select name="gender" class="form-select">
      <option selected disabled>Select Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
  </div>

  <!-- Address -->
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea name="address" class="form-control" id="address" rows="2"></textarea>
  </div>

  <!-- Submit -->
  <button type="submit" class="btn btn-color">Submit form</button>
</form>
</div>
</div>
</div>

<?php
// ================= PHP FORM HANDLER AT THE BOTTOM =================
include './Common/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $phone = trim($_POST['candidate_phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $joining_date = trim($_POST['joining_date'] ?? '');
    $qualification = trim($_POST['qualification'] ?? '');
    $specialization = trim($_POST['specialization'] ?? '');
    $salary = trim($_POST['salary'] ?? '');

    $sql = "INSERT INTO teachers (
        teacher_name,
        email,
        password,
        gender,
        teacher_phone_no,
        adress,
        joining_date,
        qualification,
        specialization,
        salary
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssssssss",
            $name,
            $email,
            $password,
            $gender,
            $phone,
            $address,
            $joining_date,
            $qualification,
            $specialization,
            $salary
        );

        if ($stmt->execute()) {
            echo "<script>
                alert(" . json_encode("Teacher added successfully!") . ");
                window.location.href = 'teacher.php';
            </script>";
        } else {
            echo "<script>alert(" . json_encode("Error: " . $stmt->error) . ");</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert(" . json_encode("Prepare failed: " . $conn->error) . ");</script>";
    }

    $conn->close();
}
?>
