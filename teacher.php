<?php  
include './Common/db.php';

$query = "SELECT * FROM teachers";
$result = mysqli_query($conn, $query);

include './admin assests/header.php';
?>

<?php
$showDeletedToast = isset($_GET['deleted']) && $_GET['deleted'] == 1;
?>

<div class="row d-flex flex-row flex-wrap h-100 p-0 m-0">
<?php include './Common/sidebar.php'; ?>

<div class="container col-10 p-2 d-flex flex-column align-items-center gap-2">

  <!-- Header Section with Toast inside -->
  <div class="container-fluid box-color d-flex flex-row justify-content-between align-items-center p-4" style="height: 100px;">
    <div><h2 class="text-white">Teachers</h2></div>

    <!-- Toast inserted here like in student.php -->
    <div class="d-flex flex-column justify-content-center">
      <?php if ($showDeletedToast): ?>
        <div id="delete-toast" class="toast-animate">
          <div class="toast align-items-center text-bg-success border-0 show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body py-2 px-3 alert-color">
                ✅ Teacher deleted successfully.
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

    <button class="btn btn-color p-3" onclick="window.location.href='teacher_register.php';">
      Add new teacher
    </button>
  </div>

  <!-- Table Section -->
  <div class="container-fluid p-0 m-0">
    <table class="table table-bordered table-dark m-0">
      <thead>
        <tr>
          <th>Teacher name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Teacher Phone No</th>
          <th>Address</th>
          <th>Joining Date</th>
          <th>Qualification</th>
          <th>Specialization</th>
          <th>Salary</th>
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
                        <a href='teacher_update.php?id={$id}' class='btn btn-sm btn-warning'>Update</a>
                    </td>
                    <td>
                        <form method='POST' action='teacher_delete.php' onsubmit='return confirm(\"Are you sure you want to delete this teacher?\")'>
                            <input type='hidden' name='id' value='{$id}'>
                            <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='11' class='text-center'>No teacher data found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</div>
</div>
