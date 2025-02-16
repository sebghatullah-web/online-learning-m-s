  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <div class="dropdown">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
            <?php 
              include('config/dbcon.php');
              $query = "SELECT name FROM admin WHERE id=1";
              $query_run = mysqli_query($con, $query);
              if(mysqli_num_rows($query_run) > 0)
              {
                foreach($query_run as $row)
                {
                  echo $row['name'];
                }
              } 
            ?>
            </button>
          <div class="dropdown-menu">
                                      <?php
                                        $query = "SELECT * FROM admin";
                                        $query_run = mysqli_query($con,$query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <a href="admin-profile.php?user_id=<?php echo $row['id']; ?>" class="dropdown-item btn btn-info btn-sm">Profile</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="change-password.php?user_id=<?php echo $row['id']; ?>" class="dropdown-item btn btn-info btn-sm">Setting</a>
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
            
            <form action="code.php" method="post">
              <button type="submit" class="dropdown-item" name="Logout_btn">Logout</button>
            </form>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->