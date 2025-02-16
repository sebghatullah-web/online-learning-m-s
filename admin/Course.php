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
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Short Name">Course Short Name</label>
                        <input type="text" class="form-control" placeholder="Short Name" name="shortname">
                    </div>
                    <div class="form-group">
                        <label for="Full Name">Course Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="Creation Date">Date of Creation</label>
                        <input type="date" class="form-control" placeholder="Creation Date" name="date">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addCourse" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User -->
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
                        <button type="submit" name="DeleteCoursebtn" class="btn btn-primary">Yes, Delete.!</button>
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
              <li class="breadcrumb-item active">Registered Course</li>
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
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Registered Course</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Class</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Course id</th>
                                        <th>Course Short Name</th>
                                        <th>Course Full Name</th>
                                        <th>Date of Creation</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM course";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['shortname']; ?></td>
                                                        <td><?php echo $row['fullname']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td>
                                                            <a href="Course-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
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