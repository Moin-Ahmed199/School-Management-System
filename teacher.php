
<?php  
include './Common/db.php';

$query = "SELECT * FROM teachers";
$result = mysqli_query($conn, $query);


?>



<?php include './admin assests/header.php' ?>
    

<div class="row d-flex flex-row flex-wrap h-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<div class="container col-10 p-2 d-flex flex-column align-items-center gap-2 ">


<div class="container-fluid box-color d-flex flex-row justify-content-end align-items-center p-4" style=" height: 100px;">

<div class="container">
<h2>Teachers </php></h2>
</div>
<button class="btn btn-color p-3" onclick="window.location.href='teacher_register.php';">
  Add new teacher
</button></div>

<div class="container-fluid p-0 m-0">
<table class="table table-bordered table-dark m-0">

  <?php

   if ($result && mysqli_num_rows($result) > 0) {
    echo "
      <thead>
<tr>
          <th>Teacher name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Teacher_phone_no</th>
          <th>Adress</th>
          <th>Joining Date</th>
          <th>Qualification</th>
          <th>Specialization</th>
          <th>Salary</th>
          <th>Action</th>
          </tr>
      </thead>
";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
          <tbody>

        <tr>
        <td>{$row['teacher_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['password']}</td>
        <td>{$row['teacher_phone_no']}</td>
        <td>{$row['adress']}</td>
        <td>{$row['joining_date']}</td>
        <td>{$row['qualification']}</td>
        <td>{$row['specialization']}</td>
        <td>{$row['salary']}</td>
         <td>
            <a href='teacher_update.php?id={$row['id']}' class='btn btn-sm btn-warning'>Update</a>
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
