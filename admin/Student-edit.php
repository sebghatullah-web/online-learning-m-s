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
                <li class="breadcrumb-item active">Registered Student</li>
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
                            <h3 class="card-title">Edit Registered Student</h3>
                            <a href="Student.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <form action="code.php" method="post">
                                    <div class="modal-body">
                                        <?php
                                            if(isset($_GET['user_id']))
                                            {
                                                $user_id = $_GET['user_id'];
                                                $query = "SELECT * FROM student WHERE id='$user_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                                        ?>
                                                        <input type="text" name="user_id" hidden value="<?php echo $row['id'] ?>">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                            <div class="form-group">
                                                                    <label for="ID">ID Number</label>
                                                                    <input type="text" value="<?php echo $row['id'] ?>" class="form-control" name="id">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="First Name">First Name</label>
                                                                    <input type="text" value="<?php echo $row['fname'] ?>" class="form-control" name="fname">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Last Name">Last Name</label>
                                                                    <input type="text" value="<?php echo $row['lname'] ?>"  class="form-control" name="lname">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="eduDegree">Father Name</label>
                                                                    <input type="text" value="<?php echo $row['faname'] ?>"  class="form-control" name="faname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="Gender">Gender</label>
                                                                    <input type="text" value="<?php echo $row['gender'] ?>" class="form-control" name="gender">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Address">Address</label>
                                                                    <input type="text" value="<?php echo $row['address'] ?>"  class="form-control" name="address">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dob">Date of Birth</label>
                                                                    <input type="date" value="<?php echo $row['dob'] ?>"  class="form-control" name="dob">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Email">Email</label>
                                                                    <input type="email" value="<?php echo $row['email'] ?>" class="form-control" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                
                                                                <div class="form-group">
                                                                    <label for="Contact">Contact No</label>
                                                                    <input type="text" value="<?php echo $row['contact'] ?>"  class="form-control" name="contact">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="UserName">User Name</label>
                                                                    <input type="text" value="<?php echo $row['uname'] ?>"  class="form-control" name="uname">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Password">Password</label>
                                                                    <input type="text" value="<?php echo $row['password'] ?>" class="form-control" name="password">
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateStudent" class="btn btn-info">Update</button>
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