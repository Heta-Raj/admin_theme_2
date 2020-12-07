<?php session_start();
include './db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
  <?php include './includes/header.php'; 
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Default Datatable</h4>
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >Id</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" >Username</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Firstname</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Lastname</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Country</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">DOB</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Gender</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Edit</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Delete</th>
                                                    </tr>
                                                </thead>        
                                                <tbody> 
                                                    <?php
                                                    $select = "SELECT * FROM `admin` ";
                                                    $res_sel = $conn->query($select);
                                                    if ($res_sel->num_rows > 0 ) {
                                                        while ($row = $res_sel->fetch_assoc()) { 
                                                    ?>  
                                                            <tr role="row">
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['username']; ?></td>
                                                                <td><?php echo $row['firstname']; ?></td>
                                                                <td><?php echo $row['lastname']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>                                                               
                                                                <td>
                                                                    <?php 
                                                                    $country = $row['country']; 
                                                                    $c = "SELECT name FROM `countries` WHERE id = $country";
                                                                    $result = $conn->query($c);
                                                                    $c_name = mysqli_fetch_assoc($result);                                                                  
                                                                    echo $c_name['name'];  
                                                                    ?>                                                                     
                                                                </td>
                                                                <td><?php echo $row['dob']; ?></td>
                                                                <td><?php echo $row['gender']; ?></td>
                                                                <td>
                                                                 <div class="col-xl-3 col-lg-4 col-sm-6" style="color: #556ee6;font-size: 25px;"><a href="user_registered_edit.php?id=<?php echo $row['id']; ?>">
                                                                    <i class="bx bx-edit-alt"></i> </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div data-id="<?php echo $row['id']; ?>" class="delete col-xl-3 col-lg-4 col-sm-6" style="color: #556ee6;font-size: 25px;">
                                                                    <i class="bx bx-x"></i> 
                                                                </div>
                                                            </td>
                                                            
                                                        </tr>

                                                        <?php 
                                                            }
                                                        }
                                                        else{
                                                            echo "No Data";
                                                        } 
                                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js" integrity="sha512-K3MtzSFJk6kgiFxCXXQKH6BbyBrTkTDf7E6kFh3xBZ2QNMtb6cU/RstENgQkdSLkAZeH/zAtzkxJOTTd8BqpHQ==" crossorigin="anonymous"></script>

<script src="assets/js/delete.js"> </script>
<!-- <script>
    $('.delete').click(function(){
        var del_data = $(this).data("id");
        alert(del_data);
    })


</script> -->

</body>

</html>