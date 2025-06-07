




<?php include './Common/header.php'; ?>



<div class="container-fluid bg-color p-3 p-sm-5 p-md-5 p-lg-5 d-flex align-items-center justify-content-center gap-3 
flex-md-wrap flex-lg-nowrap row g-0 "  id="main-container">



<div class="container col-12 col-lg-8 col-md-12 p-3 p-lg-5 rounded-3 min-vh-50 max-vh-50  box-color" id="login-container">
    <h1 class="text-center mb-2 text-white ">Register now</h1>
    <h6 class="text-white text-center mb-2" >Learn and Grow in safe hands</h6>


    <!-- ---form---- -->

    
    <form method="POST" action="index.php" class="p-4 text-white">

  <!-- Name & Father Name -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="name" class="form-label">Candidate Name</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="col-md-6">
      <label for="father_name" class="form-label">Father Name</label>
      <input type="text" name="father_name" class="form-control" id="father_name">
    </div>
  </div>

  <!-- DOB & Email -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="date" name="dob" class="form-control" id="dob">
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email Address <span>( You will login with this )</span></label>
      <input type="email" name="email" class="form-control" id="email">
    </div>
  </div>

  <!-- Guardian Phone No & Candidate CNIC -->
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="guardian_phone" class="form-label">Guardian Phone No</label>
      <input type="tel" name="guardian_phone" class="form-control" id="guardian_phone">
    </div>
    <div class="col-md-6">
      <label for="candidate_phone" class="form-label">Candidate Phone No</label>
      <input type="text" name="candidate_phone" class="form-control" id="candidate_phone">
    </div>
  </div>

  

 



  <!-- Father/Mother CNIC No -->
  <div class="mb-3">
    <label for="parent_cnic" class="form-label">Father/Mother CNIC No</label>
    <input type="text" name="parent_cnic" class="form-control" id="parent_cnic">
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
  <!-- Preferred Timing -->
  <div class="mb-3">
    <label class="form-label">Preferred Timing</label>
    <select name="timing" class="form-select">
      <option selected disabled>Select Timing</option>
      <option value="Morning">Morning (9 AM - 12 PM)</option>
      <option value="Afternoon">Afternoon (1 PM - 4 PM)</option>
      <option value="Evening">Evening (5 PM - 8 PM)</option>
    </select>
  </div>

    <!-- Address -->

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea name="address" class="form-control" id="address" rows="2"></textarea>
  </div>
  <!-- Submit -->

<!-- Inside the same form -->
<button type="submit" name="action" value="Signup" class="btn btn-color">Submit form</button>
<button type="submit" name="action" value="login" class="btn btn-color">Already have Account?</button>


</form>
    
     
        
     
     
    
  



</div>
</div>



<?php include './Common/footer.php'; ?>