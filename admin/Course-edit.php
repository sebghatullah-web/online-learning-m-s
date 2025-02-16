<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
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
                <li class="breadcrumb-item active">Registered Course</li>
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
                            <h3 class="card-title">Edit Registered Course</h3>
                            <a href="Course.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                <form action="code.php" method="post">
                                    <div class="modal-body">
                                        <?php
                                            if(isset($_GET['user_id']))
                                            {
                                                $user_id = $_GET['user_id'];
                                                $query = "SELECT * FROM course WHERE id='$user_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                                        ?>
                                                        <input type="text" name="user_id" hidden value="<?php echo $row['id'] ?>">

                                                        <div class="form-group">
                                                            <label for="Short Name">Course Short Name</label>
                                                            <input type="text" value="<?php echo $row['shortname'] ?>" class="form-control" placeholder="Short Name" name="shortname">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Full Name">Course Full Name</label>
                                                            <input type="text" value="<?php echo $row['fullname'] ?>"  class="form-control" placeholder="Full Name" name="fullname">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Creation Date">Date of Creation</label>
                                                            <input type="date" value="<?php echo $row['date'] ?>"  class="form-control" placeholder="Creation Date" name="date">
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateCourse" class="btn btn-info">Update</button>
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