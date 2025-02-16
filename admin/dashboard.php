<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/dist/css/style.css">
</head>
<body>
<?php
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

          <div class="col-ms-12">
            <?php include('message.php'); ?>
          </div>

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $sql = "SELECT * FROM videos";
                  $sql_run = mysqli_query($con, $sql);
                  $total = mysqli_num_rows($sql_run);
                  echo "<h3>".$total."</h3>";
                ?>
                <p>Videos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="video.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                
                <?php
                  $sql = "SELECT * FROM images";
                  $sql_run = mysqli_query($con, $sql);
                  $total = mysqli_num_rows($sql_run);
                  echo "<h3>".$total."</h3>";
                ?>

                <p>Pictures</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="picture.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                
                <?php
                  $sql = "SELECT * FROM subject";
                  $sql_run = mysqli_query($con, $sql);
                  $total = mysqli_num_rows($sql_run);
                  echo "<h3>".$total."</h3>";
                ?>

                <p>Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="Subject.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                
                <?php
                  $sql = "SELECT * FROM course";
                  $sql_run = mysqli_query($con, $sql);
                  $total = mysqli_num_rows($sql_run);
                  echo "<h3>".$total."</h3>";
                ?>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="Course.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <section class="content-body">
      <div class="row">
        <div class="col-md-6">
          <div class="small-box1">
            <img src="assets/dist/img/education3.jpg" alt="education picture" width="700">
          </div>
        </div>
        <div class="col-md-6">
          <div class="small-box2">
          <img src="assets/dist/img/education4.jpg" alt="education picture" width="700">
          </div>
        </div>
      </div>
      </div>
    </section>



</div>

<?php include('includes/script.php') ?>
<?php include('includes/footer.php') ?> 
</body>
</html>


