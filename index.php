
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Education Management System</title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
    <link rel="icon" href="img/lg.png">
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .nav-item {
        padding-left: 30px;
        padding-right: 30px;
      }
    </style>
    
</head>
<body class="body-home">

   <div class="black-fill"><br><br>
      <div class="container">


          <div class="header-bar">
            <nav class="navbar navbar-expand-lg bg-light" id="homeNav">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                     </li>
                    
                    
                     
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Example
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="#about" class="nav-link">Videos</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="#about" class="nav-link">images</a>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="#about" class="nav-link">books</a>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                     </li>
                      <li class="nav-item">
                        <a href="admin/login.php" class="nav-link">Admin</a>
                     </li>
                  </ul>
               </div>
            </nav>
          </div>
         <!-- Slideshow 4 -->


      <!-- <nav class="navbar navbar-expand-lg bg-light" id="homeNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/lg.png" width="40">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="admin/login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->
      
      
      
      
      <br><br><br>


      <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        <img src="img/lg.png">
        <h4>Welcome to OEMS</h4>
        <p>OEMS(Online Eduction Management System)</p>
      </section>
      <section id="about" class="d-flex justify-content-center align-items-center flex-column">
        <div class="card mb-3 card-1">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/lg.png" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">About Us</h5>
                <p class="card-text">This is a learning website and every one can create a account and use from resources. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Onlin Education Management System</small></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!--subscribe-address-->
      <section id="contact" class="subscribe d-flex justify-content-center align-items-center flex-column">
         <div class="container-fluid">
         <div class="row">
            
            <div class="col-lg-12 col-md-12 address-w3l-right text-center">
               <?php

                  $ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
                  $cnt=1;
                  while ($row=mysqli_fetch_array($ret)) {

                  ?>
                  <h4><?php  echo $row['PageTitle'];?></h4>
               <div class="address-gried ">
                  <span class="far fa-map"></span>
                  <p><?php  echo $row['PageDescription'];?>
                  <p>
               </div>
               <div class="address-gried mt-3">
                  <span class="fas fa-phone-volume"></span>
                  <p> <?php  echo $row['MobileNumber'];?>
                  <br>Time: <?php  echo $row['Timing'];?></p>
               </div>
               <div class=" address-gried mt-3">
                  <span class="far fa-envelope"></span>
                  <p><?php  echo $row['Email'];?>
                     
                  </p>
               </div><?php } ?>
            </div>
         </div>
		 </div>
      </section>
      <div class="text-center text-light">
        Copyright &copy; 2023 Online Education Management System. All rights reserved.
      </div>
      </div>    
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>