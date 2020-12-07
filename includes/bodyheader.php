 <?php 
 include './db.php'; 

?>
 <header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <!-- App Search-->
        <?php 
        $user_id = $_SESSION['user_id'];
  
        $sel = "SELECT * FROM admin Where id = $user_id";
        $res = $conn->query($sel);
        $data = mysqli_fetch_assoc($res);
        ?>
        <div class="d-flex" style="margin-left: auto;">                      
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect " id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php if (isset($data['image'])) {  $dir = "/admintheme2/uploads/" . $data['image']; ?>
                                                    <img src="<?php echo $dir; ?>" alt="user_img" width= "80px" height="auto" class="img-thumbnail rounded-circle">
            <?php } ?>
                
                <span class="d-none d-xl-inline-block ml-1" key="t-henry"><?php echo $data['username']; ?></span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a class="dropdown-item" href="profile.php"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-profile">Profile</span></a>                                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Logout</span></a>
            </div>
        </div>     

    </div>
</header>

