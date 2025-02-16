<?php
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');

    if(isset($_POST['updateVid']))
    {
        // Check if the file is uploaded
        if(isset($_FILES['video']) && $_FILES['video']['error'] == 0){
  
            // Get the file information
            $user_id = $_POST['user_id'];
            $name = $_FILES['video']['name'];
            $size = $_FILES['video']['size'];
            $type = $_FILES['video']['type'];
            $tmp_name = $_FILES['video']['tmp_name'];
        
            // Set the upload path
            $upload_path = 'videos/' . $name;
        
            // Check if the file type is valid
            if($type == 'video/mp4' || $type == 'video/webm' || $type == 'video/ogg'){
        
              // Check if the file size is less than 100 MB
              if($size < 100000000){
        
                // Move the file to the upload folder
                if(move_uploaded_file($tmp_name, $upload_path)){
        
                  // Insert the file name and other details into the database
                  $sql = "UPDATE images SET name='$name',size='$size',type='$type',path='$upload_path' WHERE id='$user_id'";
                  $result = mysqli_query($con, $sql);
        
                  // Check if the query was successful
                  if($result){
                    echo "The video file was uploaded and stored successfully.";
                  } else {
                    echo "There was an error inserting the file into the database.";
                  }
        
                } else {
                  echo "There was an error moving the file to the upload folder.";
                }
        
              } else {
                echo "The file size is too large. Please upload a file less than 100 MB.";
              }
        
            } else {
              echo "The file type is not supported. Please upload a video file with mp4, webm or ogg extension.";
            }
        
          } else {
            echo "There was an error uploading the file.";
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
                <li class="breadcrumb-item active">Stored Videos</li>
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
                            <h3 class="card-title">Edit Stored Videos</h3>
                            <a href="video.php" class="btn btn-danger btn-sm float-right">Back</a>
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
                                                $query = "SELECT * FROM videos WHERE id='$user_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                                        ?>
                                                        <input type="text" name="user_id" hidden value="<?php echo $row['id'] ?>">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Creation Date">Video</label><br>
                                                                    <div>
                                                                        <?php 
                                                                        echo "<video width='250' height='250' controls>";
                                                                        echo "<source src='$path' type='$type'>";
                                                                        echo "Your browser does not support HTML video.";
                                                                        echo "</video>";
                                                                        ?> 
                                                                    </div>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Creation Date">New Video</label><br><br><br><br>
                                                                    <input type="file" value=""  class="form-control" placeholder="Creation Date" name="video">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateVid" class="btn btn-info">Update</button>
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