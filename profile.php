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
                                    $sel = "SELECT * FROM admin Where id = $user_id";
                                    $res = $conn->query($sel);
                                    $data = mysqli_fetch_assoc($res);
                                    ?>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                   <?php if (isset($data['image'])) {  $dir = "/admintheme2/uploads/" . $data['image']; ?>
                                                    <img src="<?php echo $dir; ?>" alt="user_img" width= "80px" height="auto" class="img-thumbnail rounded-circle">
            <?php } ?>
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo $data['username']; ?></h5>
                                               
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                        <p class="text-muted mb-4">Hi I'm <?php echo $data['username']; ?>,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>

                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?php echo $data['firstname'].' ' .$data['lastname']; ?></td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo $data['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $row = $data['country'];
                                                        $sel_country = "SELECT name FROM countries WHERE id ='$user_id' ";
                                                        $result = $conn->query($sel_country);
                                                        $cntry = mysqli_fetch_assoc($result);

                                                        $row = $data['state'];
                                                        $sel_state = "SELECT name FROM states WHERE id ='$user_id' ";
                                                        $result = $conn->query($sel_state);
                                                        $state = mysqli_fetch_assoc($result); 

                                                        ?>
                                                        <th scope="row">Location :</th>
                                                        <td><?php echo $state['name'].', '. $cntry['name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Date of Birth :</th>
                                                        <td><?php echo $data['dob']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Gender :</th>
                                                        <td><?php echo $data['gender']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col"><a href="edit_profile.php">
                <button type="submit" name="submit" id="submit" class="btn btn-primary w-md">Edit Profile</button></a>
            </div>
             <div class="col"><a href="change_password.php">
                <button type="submit" class="btn btn-primary w-md">Change password</button></a>
            </div>

                                        </div>
                                         
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
</body>
</html>