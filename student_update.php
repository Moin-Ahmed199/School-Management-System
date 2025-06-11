<?php
include './Common/db.php';
include './admin assests/header.php';
?>

<div class="row d-flex flex-row flex-wrap vh-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<?php
$message = '';
$student = [
    'candidate_name' => '',
    'father_name' => '',
    'date_of_birth' => '',
    'email' => '',
    'password' => '',
    'guardian_phone_no' => '',
    'conditate_phone_no' => '',
    'parent_cnic' => '',
    'gender' => '',
    'adress' => ''
];

// ✅ Get student by ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $student_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "<p>Invalid student ID</p>";
    exit;
}

// ✅ Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $candidate_name = trim($_POST['candidate_name']);
    $father_name = trim($_POST['father_name']);
    $dob = trim($_POST['date_of_birth']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $guardian_phone = trim($_POST['guardian_phone_no']);
    $student_phone = trim($_POST['conditate_phone_no']);
    $cnic = trim($_POST['parent_cnic']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['adress']);

    $sql = "UPDATE students SET 
        candidate_name = ?, father_name = ?, date_of_birth = ?, email = ?, password = ?,
        guardian_phone_no = ?, conditate_phone_no = ?, parent_cnic = ?, gender = ?, adress = ?
        WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssi", $candidate_name, $father_name, $dob, $email, $password,
                          $guardian_phone, $student_phone, $cnic, $gender, $address, $student_id);

        if ($stmt->execute()) {
            $message = "<div class='alert alert-success mt-3'>Student updated successfully! Redirecting...</div>";
            echo "<script>setTimeout(() => { window.location.href = 'student.php'; }, 2000);</script>";
        } else {
            $message = "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='alert alert-danger mt-3'>Prepare failed: " . $conn->error . "</div>";
    }
}
?>

<div class="container-fluid col-10 d-flex align-items-start justify-content-center 
flex-md-wrap flex-lg-nowrap row g-0 p-2" id="main-container">

<div class="container col-lg-10 p-3 p-lg-5 rounded-3 box-color mt-5" id="login-container">
<button class="btn btn-color col-2" onclick="window.location.href='student.php';">
  Go Back
</button>
<h1 class="text-center mb-2 text-white">Update Student Data</h1>
<h6 class="text-white text-center mb-2">Learn and Grow in safe hands</h6>

<form method="POST" action="" class="text-white">

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Student Name</label>
      <input type="text" name="candidate_name" class="form-control" value="<?= htmlspecialchars($student['candidate_name']) ?>">
    </div>
    <div class="col-md-6">
      <label class="form-label">Father Name</label>
      <input type="text" name="father_name" class="form-control" value="<?= htmlspecialchars($student['father_name']) ?>">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Date of Birth</label>
      <input type="date" name="date_of_birth" class="form-control" value="<?= htmlspecialchars($student['date_of_birth']) ?>">
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email']) ?>">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Password</label>
      <input type="text" name="password" class="form-control" value="<?= htmlspecialchars($student['password']) ?>">
    </div>
    <div class="col-md-6">
      <label class="form-label">Guardian Phone</label>
      <input type="text" name="guardian_phone_no" class="form-control" value="<?= htmlspecialchars($student['guardian_phone_no']) ?>">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label">Student Phone</label>
      <input type="text" name="conditate_phone_no" class="form-control" value="<?= htmlspecialchars($student['conditate_phone_no']) ?>">
    </div>
    <div class="col-md-6">
      <label class="form-label">Parent CNIC</label>
      <input type="text" name="parent_cnic" class="form-control" value="<?= htmlspecialchars($student['parent_cnic']) ?>">
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Gender</label>
    <select name="gender" class="form-select">
      <option disabled>Select Gender</option>
      <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
      <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
      <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="adress" class="form-control" rows="2"><?= htmlspecialchars($student['adress']) ?></textarea>
  </div>

  <button type="submit" class="btn btn-color">Update Student</button>

  <!-- ✅ Feedback -->
  <?= $message ?>
</form>

</div>
</div>
</div>
