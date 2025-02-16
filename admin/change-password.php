<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');


    // Change Admin Password 
    if(isset($_POST['changeAdminPassword']))
    {
        $user_id = $_POST['user_id'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $query = "SELECT password FROM admin WHERE id='$user_id' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            
                if($newPassword == $confirmPassword)
                {
                    $sql = "UPDATE admin SET password='$newPassword' WHERE id='$user_id' ";
                    $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result) > 0)
                    {
                        echo '<script>alert("Your password successully changed.")</script>';
                        header('location: dashboard.php');
                    }else
                    {
                        echo '<script>alert("Your password do not changed.")</script>';
                        
                    }
                }
                else
                {
                    echo '<script>alert("NewPassword with ConfirmPassword Does Not Match.!")</script>';
                    
                }
           
        }
        else
        {
            echo '<script>alert("Query not Selected!")</script>';
            header('location: change-password.php');
        }

    }


?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

 <!-- content header (page header) -->
 <section>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Change Admin Password</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <!-- /.content-header -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">change Admin Password</h3>
                            <a href="dashboard.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php
                                            if(isset($_GET['user_id']))
                                            {
                                                $user_id = $_GET['user_id'];
                                                $query = "SELECT * FROM admin WHERE id='$user_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                                        ?>
                                                        <input type="text" name="user_id" hidden value="<?php echo $row['id'] ?>">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="form-group">
                                                                    <label for="ID">Current Password</label>
                                                                    <input type="text" class="form-control" name="currentPassword">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="First Name">New Password</label>
                                                                    <input type="text" class="form-control" name="newPassword">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Last Name">Confirm Password</label>
                                                                    <input type="text" class="form-control" name="confirmPassword">
                                                                </div>  
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="changeAdminPassword" class="btn btn-info">Change</button>
                                                        </div>

                                                        <?php
                                                    }
                                                }else
                                                {
                                                    echo "<h4>No Record Found!</h4>";
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>


 
 </div>
 <?php include('includes/script.php') ?>
<?php include('includes/footer.php') ?>