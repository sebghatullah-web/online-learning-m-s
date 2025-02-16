<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');

    $query = "SELECT fullname FROM course";
    $query_run = mysqli_query($con, $query);
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Subject</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
							<div class="col-md-12">
								<div class="form-group">
                                    <label for="Teacher Name">Select Course Name:</label>
                                    <select name="form-group" name="coursName" required="true">
                                        <option value="">Select</option>
                                        <?php 
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {?>
                                                    <option value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>
                                        <?php }} ?>   
                                    </selec  t>
								</div>
								<div class="form-group">
									<label for="Title">Title</label>
									<input type="text" class="form-control" placeholder="Title" name="title" required>
								</div>
								<div class="form-group">
									<label for="Author">Author</label>
									<input type="text" class="form-control" placeholder="Author" name="author" required>
								</div>
								<div class="form-group">
									<label for="Publication">Publication Date</label>
									<input type="date" class="form-control" placeholder="Publication" name="publication" required>
								</div>
								<div class="form-group">
									<label for="Publisher">Publisher</label>
									<input type="text" class="form-control" placeholder="Publisher" name="publisher" required>
								</div>
                                <div class="form-group">
									<label for="Book">Book</label>
									<input type="file" class="form-control" placeholder="Book" name="book">
								</div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addSubject" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete subject -->

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
                        <button type="submit" name="DeleteSubjectbtn" class="btn btn-primary">Yes, Delete.!</button>
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
              <li class="breadcrumb-item active">Registered Subject</li>
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
                            <h3 class="card-title">Registered Subject</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Subject</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject ID</th>
                                        <th>Taecher/Name</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publication</th>
                                        <th>Publisher</th>
                                        <th>Book</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM subject";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['tname']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['author']; ?></td>
                                                        <td><?php echo $row['publication']; ?></td>
                                                        <td><?php echo $row['publisher']; ?></td>
                                                        <td>
                                                        <a href="view-pdf.php?pdf=<?php echo $row['book']; ?>" target="_blank">
                                                        <?php echo $row['book']; ?>
                                                        </a>
                                                        </td>
                                                        <td>
                                                            <a href="Subject-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
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