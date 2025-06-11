
<?php  
include './Common/db.php';

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);


?>



<?php include './admin assests/header.php' ?>
    

<div class="row d-flex flex-row flex-wrap h-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<div class="container col-10 p-2 d-flex flex-column align-items-center gap-2">


<div class="container-fluid box-color d-flex flex-row justify-content-end align-items-center p-4 " style=" height: 100px;">

<div class="container">
<h2>Students </php></h2>
</div>
<button class="btn btn-color p-3" onclick="window.location.href='student_register.php';">
  Add new student
</button>
</div>

<div class="container-fluid p-0 m-0">
<table class="table border table-dark m-0">

  <?php

   if ($result && mysqli_num_rows($result) > 0) {
    echo "
      <thead>
<tr>
            <th>Name</th>
            <th>Father Name</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Password</th>
            <th>Guardian Phone</th>
            <th>Student Phone</th>
            <th>CNIC</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
      </thead>
";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
          <tbody>

        <tr>
                <td>{$row['candidate_name']}</td>
                <td>{$row['father_name']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>{$row['guardian_phone_no']}</td>
                <td>{$row['conditate_phone_no']}</td>
                <td>{$row['parent_cnic']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['adress']}</td>
<td>
            <a href='student_update.php?id={$row['id']}' class='btn btn-sm btn-warning'>Update</a>
            </td>
              </tr>
                </tbody>
";
    }

} else {
    echo "No student data found.";
}
?>
   


</table>
</div>
</div>
