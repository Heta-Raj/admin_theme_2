<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
  <?php include './includes/header.php'; 
  include './db.php';
  if (!isset($_SESSION['user_id'])) {
      header('location:./login.php');
  }
  if (isset($_POST['submit'])) {
  	
      $id = $_POST['id'];
      $username = $_POST['username'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];     
      $country = $_POST['country'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $dob = $_POST['dob'];
      $gender = $_POST['gender'];

     $update = "UPDATE admin SET username = '$username', firstname = '$firstname', lastname = '$lastname', email = '$email',country = '$country', state = '$state', city = '$city', dob = '$dob', gender = '$gender' WHERE id = '$id' ";
       
      $r_update = $conn->query($update);
      

      if ($r_update) {
        //echo "data updated";
        header('location:./user_list.php');
      }
      else{
        echo "unable to update";
      }      
  }
  ?> 
</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
         <?php include './includes/bodyheader.php'; ?> 

         <!-- ========== Left Sidebar Start ========== -->
         <?php include './includes/sidebar.php' ?>
         <!-- Left Sidebar End -->
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="main-content">

            <div class="page-content">
               <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Form</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">User Registration Form</h4>
                                <?php
                                $row_id = $_GET['id'];
                                $select = "SELECT * FROM admin WHERE id =  $row_id";
                                $result = $conn->query($select);
                                $row = mysqli_fetch_assoc($result);

                                ?>
                                <form method="POST" id="edit_user_reg" >
                                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label>User name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >First name</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Last name</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" >
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                               <label>Country</label>
                                               <select id="country" name="country" class="country form-control">
                                                <option selected="">Choose...</option>
                                                  <?php 
                                                $sel_country = "SELECT * FROM countries ";
                                                $res_country = $conn->query("$sel_country");
                                                foreach ($res_country as $r) { ?>
                                                  <option value="<?php echo $r['id']; ?>" 
                                                    <?php if ($row['country'] == $r['id']) { echo "selected"; } ?>>
                                                    <?php echo $r['name']; ?>
                                                    </option>
                                              <?php } 
                                              ?>                                              
                                          </select>                                               
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select id="state" name="state" class="state form-control">
                                            <option selected="">Choose...</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select id="city" name="city" class="city form-control">
                                            <option selected="">Choose...</option>                                                
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="input-group">
                                        <input type="text" id="dob" name="dob" class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker" value="<?php echo $row['dob']; ?>" >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col">
                                           <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" >
                                            <label class="form-check-label" >
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                       <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female" checked>
                                        <label class="form-check-label" >
                                           Female
                                       </label>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div>
                <button type="submit" name="submit" class="btn btn-primary w-md">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>


</div>
<!-- end row -->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Modal -->

<!-- end modal -->
<?php include './includes/bodyfooter.php'; ?>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<?php include './includes/footer.php'; ?> 
<script src="assets/js/edit.js"></script>
</body>
</html>