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

<?php
// Connect to DB
include './Common/db.php';

// Count students
$student_query = "SELECT COUNT(*) as total_students FROM students";
$student_result = mysqli_query($conn, $student_query);
$student_row = mysqli_fetch_assoc($student_result);
$total_students = $student_row['total_students'];

// Count teachers
$teacher_query = "SELECT COUNT(*) as total_teachers FROM teachers";
$teacher_result = mysqli_query($conn, $teacher_query);
$teacher_row = mysqli_fetch_assoc($teacher_result);
$total_teachers = $teacher_row['total_teachers'];
?>












<?php include './admin assests/header.php'; ?>

<div class="row d-flex flex-row flex-wrap h-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<div class="container col-10 p-0 ">

<div class="row d-flex justify-content-center h-100 m-0  ">

    <div class="container-fluid d-flex justify-content-around flex-wrap p-4 h-25 ">
 <div class="col-3 box-color h-100 rounded-4">
            <h1 class="text-center">Total Students <br>  <?php echo $total_students; ?></h1>
        </div>

        <div class="col-3 box-color h-100 rounded-4">
            <h1 class="text-center">Total Teachers <br> <?php echo $total_teachers ?></h1>
        </div>

        <div class="col-3 box-color h-100 rounded-4">
            <h1>box</h1>
        </div>

</div>






</div>
</div>

</div>











