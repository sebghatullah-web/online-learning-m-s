

<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="padding-left:30px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Teacher</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
							<div class="col-ms-6">
								<div class="form-group">
								<label for="Short Name">First Name</label>
								<input type="text" class="form-control" placeholder="First Name" name="fname">
								</div>
								<div class="form-group">
									<label for="Full Name">Last Name</label>
									<input type="text" class="form-control" placeholder="Last Name" name="lname">
								</div>
								<div class="form-group">
									<label for="Creation Date">Education Degree</label>
									<input type="text" class="form-control" placeholder="Education Degree" name="eduDegree">
								</div>
								<div class="form-group">
									<label for="Full Name">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="FeMale">FeMale</option>
                                        <option value="Other">Other</option>
                                    </select>
								</div>
								<div class="form-group">
									<label for="Full Name">Address</label>
									<input type="text" class="form-control" placeholder="Address" name="address">
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="Full Name">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Date of Birth" name="dob">
                            </div>
                            <div class="form-group">
                                <label for="Full Name">Email</label>
                                <span class="email_irror text-danger ml-2"></span>
                                <input type="email" class="form-control " placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="Full Name">Contact</label>
                                <input type="text" class="form-control" placeholder="Contact" name="contact">
                            </div>
                            <div class="form-group">
                                <label for="Full Name">User Name</label>
                                <input type="text" class="form-control" placeholder="User Name" name="uname">
                            </div>
                            <div class="form-group">
                                <label for="Full Name">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="Full Name">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword">
                            </div>
                            </div>
                    
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addTeacher" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Teacher -->

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Course</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" class="delete_user_id">
                    <p>Are you sure. you want to delete this record?</p>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="DeleteTeacherbtn" class="btn btn-primary">Yes, Delete.!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- content header (page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Teacher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- /.content-header -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            
                <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Registered Teacher</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Teacher</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID No</th>
                                        <th>F/Name</th>
                                        <th>L/Name</th>
                                        <th>EduDegree</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM teacher";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['fname']; ?></td>
                                                        <td><?php echo $row['lname']; ?></td>
                                                        <td><?php echo $row['eduDegree']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['contact']; ?></td>
                                                        <td>
                                                            <a href="Teacher-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                            <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }else
                                        {
                                           ?>
                                            <tr>
                                                <td>No Record Found</td>
                                            </tr>
                                           <?php
                                        }
                                    ?>
            
                                </tbody>
                            </table>
                        </div>

                </div>

            </div>
        </div>
    </div>
</section>


 </div>
<?php include('includes/script.php') ?>

<script>

    $(document).ready(function () {
       
        $('.email_id').keyup(function (e) {
           var email = $('.email_id').val();
           
           $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'check_Emailbtn':1,
                'email': email,
            },
            success: function(response) {
                $('.email_irror').text(response);
            }
           });

        });

    });
    

</script>
    
    <script>
        $(document).ready(function(){
            $('.deletebtn').click(function(e){
                e.preventDefault();

                var user_id = $(this).val();
                $('.delete_user_id').val(user_id);
                $('#DeleteModal').modal('show');

            });
        });
    </script>

<?php include('includes/footer.php') ?>