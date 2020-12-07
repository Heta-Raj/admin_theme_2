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
      $user_id = $_SESSION['user_id'];
      $username = $_POST['username'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];      
      $country = $_POST['country'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $dob = $_POST['dob'];
      $gender = $_POST['gender'];


      $update = "UPDATE admin SET username = '$username', firstname = '$firstname', lastname = '$lastname', email = '$email',country = '$country', state = '$state', city = '$city', dob = '$dob', gender = '$gender' WHERE id = '$user_id' ";
      $r_update = $conn->query($update);
      if ($r_update) {
        header("location:./profile.php");
      }else{
        echo "update fail";
      }


      if ($_FILES['profile_img']['size'] > 0) {

          
          $dir =$_SERVER['DOCUMENT_ROOT'] .  '/admintheme2/uploads/';
          $filename =date("y-m-s-H-i-s"). basename($_FILES["profile_img"]["name"]);

          $file = $dir . $filename;        
          
          $temp_name = $_FILES['profile_img']['tmp_name'];
          echo $temp_name;
          $uploadOk = 1;
          
          $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
          
          if ($temp_name !== false) {
            $uploadOk = 1;
          
            $update_img = "UPDATE admin SET image = '$filename' WHERE id = '$user_id'";
            $res_upt = $conn->query($update_img);
            if (move_uploaded_file($temp_name, $file)) {
                //echo "profile update";
                header("location:./profile.php");
            }
            else{
                echo "Error in image insertion";
            }
          }else{
                echo "File is not an img";
                $uploadOk = 0;
            }
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
                   <div class="col">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    $sel = "SELECT * FROM admin Where id = '$user_id'";
                                    $res = $conn->query($sel);
                                    $data = mysqli_fetch_assoc($res);
                                    ?>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <?php if (isset($data['image'])) {
                                                    $dir = "/admintheme2/uploads/" . $data['image']; ?>
                                                    <img src="<?php echo $dir; ?>" alt="user_img" width= "220px" height="auto" class="img-thumbnail rounded-circle">
                                                <?php } ?>
                                                    <!-- <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle"> -->
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo $data['username']; ?></h5>
                                               
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                       
                                        <form method="POST" name="edit_profile"  enctype="multipart/form-data">
                                             <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="profile_img" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose profile</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>User name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >First name</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $data['firstname']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Last name</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $data['lastname']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
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
                                                    <?php if ($data['country'] == $r['id']) { echo "selected"; } ?>>
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
                                        <input type="text" id="dob" name="dob" class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker" value="<?php echo $data['dob']; ?>" >
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
                 <button type="submit" name="submit" id="submit" class="btn btn-primary w-md">Update</button>
            </div>
                         
        </form>
                                      
                                        
                                    </div>
                                </div>
                                <!-- end card -->
                               
                               
                                <!-- end card -->
                            </div>
               </div>
               
        
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