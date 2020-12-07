<?php session_start(); ?>
<!doctype html>
<html lang="en">   
<head>
    <title>Login | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <?php include './include/header.php'; 
    include './db.php'; 
    if (isset($_SESSION['user_id'])) {
       
       header('location:./index.php');
    }
     //print_r($_SESSION);
    ?>
</head>
<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
             <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Sign in to continue to Skote.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0"> 
                    <div>
                        <a href="#">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                     <form class="form-horizontal"  name="loginform"  id="loginform" method="POST" >

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control valid" id="username" name="username" placeholder="Enter username" aria-invalid="false">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control error" id="password" name="password" placeholder="Enter password" aria-invalid="true" required>      
                        </div>
                        <div id="message"></div>
                        <div class="mt-4">
                            <p><a href="forgot.php" class="font-weight-medium text-primary"> Forgot password ? </a> </p>
                        </div>
                        <div class="mt-4">
                            <button  class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="submitlgn" id="submitlgn">Login</button>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">

            <div>
                <p>Don't have an account ? <a href="signup.php" class="font-weight-medium text-primary"> Signup now </a> </p>
                <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>
        </div>

    </div>
</div>
</div>
</div>

<?php include './include/footer.php'; ?>
</body>

</html>
