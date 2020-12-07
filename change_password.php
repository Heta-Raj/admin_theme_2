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
      $cpassword = $_POST['cpassword'];
      $newpassword = $_POST['newpassword'];
      $md5 = md5($newpassword);

      $select = "SELECT password from admin WHERE id = $user_id ";
      $result = $conn->query($select);     
      $row = $result->fetch_assoc();  
        if ($_POST['newpassword'] === $_POST['cpassword']) {
            $update = "UPDATE admin SET password = '$md5' WHERE id = $user_id  ";
            if ($conn->query($update) === TRUE) {
               //echo "updated";
               header('location:./profile.php');
            } else {
                echo "not update";
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

                               <div class="p-2">
                                <div class="p-2">
                                   <form class="form-horizontal"  method="POST" >
                                             
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter password"  minlength="5">         
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter password"  minlength="5">        
                                    </div>    

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit" id="submit">Reset</button>
                                        </div>
                                    </div>

                                </form>
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