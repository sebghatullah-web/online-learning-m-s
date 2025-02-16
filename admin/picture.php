<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');

        // Check if the form is submitted
if(isset($_POST['addImage']))
{

    // Check if the file is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
  
      // Get the file information
      $name = $_FILES['image']['name'];
      $size = $_FILES['image']['size'];
      $type = $_FILES['image']['type'];
      $tmp_name = $_FILES['image']['tmp_name'];
  
      // Set the upload path
      $upload_path = 'images/' . $name;
  
      // Check if the file type is valid
      if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg'){
  
        // Check if the file size is less than 10 MB
        if($size < 10000000){
  
          // Move the file to the upload folder
          if(move_uploaded_file($tmp_name, $upload_path)){
  
            // Insert the file name and other details into the database
            $sql = "INSERT INTO images (name, size, type, path) VALUES ('$name', '$size', '$type', '$upload_path')";
            $result = mysqli_query($con, $sql);
  
            // Check if the query was successful
            if($result){
              echo "The image file was uploaded and stored successfully.";
            } else {
              echo "There was an error inserting the file into the database.";
            }
  
          } else {
            echo "There was an error moving the file to the upload folder.";
          }
  
        } else {
          echo "The file size is too large. Please upload a file less than 10 MB.";
        }
  
      } else {
        echo "The file type is not supported. Please upload an image file with jpg, png or gif extension.";
      }
  
    } else {
      echo "There was an error uploading the file.";
    }
  
  } else {
    echo "Please select an image file to upload.";
  }

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Picture</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="CourseName">Select Course Name: </label>
                        <select name="form-group" name="coursName" required="true">
                            <option value="">Select</option>
                            <?php 
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {?>
                                        <option value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>
                             <?php }} ?>   
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Short Name">Add Image</label>
                        <input type="file" class="form-control" placeholder="add picture" name="image">
                    </div>
                   
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addImage" class="btn btn-primary">Save</button>
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
                        <button type="submit" name="DeletePicbtn" class="btn btn-primary">Yes, Delete.!</button>
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
              <li class="breadcrumb-item active">Stored Picture</li>
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
                            <h3 class="card-title">Stored Picture</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Pic</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Pic id</th>
                                        <th>Pic Name</th>
                                        <th>Pic Size</th>
                                        <th>Pic Type</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                    // Fetch the data from the database table
                                    $sql = "SELECT * FROM images";
                                    $result = mysqli_query($con, $sql);

                                    // Check if there are any records
                                    if(mysqli_num_rows($result) > 0){

                                    // Loop through the results
                                    while($row = mysqli_fetch_assoc($result)){

                                        // Get the image information
                                        $pic_id = $row['id'];
                                        $name = $row['name'];
                                        $size = $row['size'];
                                        $type = $row['type'];
                                        $path = $row['path'];

                                        // Display the image information and image on the web page
                                        ?>
                                            <tr>
                                                <td><?php echo "<h3>$pic_id</h3>"; ?></td>
                                                <td><?php echo "<h3>$name</h3>"; ?></td>
                                                <td><?php echo "<p>Size: $size bytes</p>"; ?></td>
                                                <td><?php echo "<p>Type: $type</p>"; ?></td>
                                                <td><?php echo "<img src='$path' alt='$name' width='100' hieght='50'/>"; ?></td>
                                                <td>
                                                    <a href="picture-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                    <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</a>
                                                </td>
                                            </tr>

                                        <?php
                                        
                                        
                                        
                                        
                                    }

                                    } else {
                                    echo "No images found in the database.";
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