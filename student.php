<?php  
include './Common/db.php';

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

include './admin assests/header.php';
?>

<div class="row d-flex flex-row flex-wrap h-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>


<div class="container col-10 p-2 d-flex flex-column align-items-center gap-2">





  <div class="container-fluid box-color d-flex flex-row justify-content-between align-items-center p-4" style="height: 100px;">
  <div><h2 class="text-white">Students</h2></div>

  
  <div class="d-flex flex-column justify-content-center">
    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
      <div id="delete-toast" >
        <div class="toast align-items-center text-bg-success border-0 show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body py-2 px-3 alert-color" >
              ✅ Student deleted successfully.
            </div>
          </div>
        </div>
      </div>

      <script>
        setTimeout(() => {
          const toast = document.getElementById('delete-toast');
          if (toast) toast.remove();

          const url = new URL(window.location.href);
          url.searchParams.delete('deleted');
          window.history.replaceState({}, document.title, url.toString());
        }, 2000);
      </script>
    <?php endif; ?>

    </div>


    <button class="btn btn-color p-3" onclick="window.location.href='student_register.php';">
      Add new student
    </button>
  </div>

  <!-- Toast message on successful delete -->
  
  <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
<?php endif; ?>


  <div class="container-fluid p-0 m-0">
    <table class="table table-bordered table-dark m-0">
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
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              echo "
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
                  <a href='student_update.php?id={$id}' class='btn btn-sm btn-warning'>Update</a>
                </td>
                <td>
                  <form method='POST' action='student_delete.php' onsubmit='return confirm(\"Are you sure you want to delete this student?\")'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                  </form>
                </td>
              </tr>
              ";
          }
        } else {
          echo "<tr><td colspan='12' class='text-center'>No student data found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
