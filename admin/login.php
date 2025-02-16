<?php 
    include('includes/header.php');
?>



<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 my-5">
                <?php 
                    include('message.php');
                ?>
                <div class="card my-5">
                    <div class="card-header bg-dark">
                        <h5>Login Page</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="code.php" method="post">
                            <label for="roles">Select Role</label>
                            <select name="role" class="form-control">
                                <option value="">Select</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                            <div class="form-group">
                                <label for="User Name">User Name</label>
                                <input type="text" name="uname" class="form-control" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                            </div>
                            
                                <a href="../index.php" style="margin-left: 120px;" class="d-flex justify-content-center align-items-center flex-column">BACK TO HOME PAGE</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php 
    include('includes/footer.php');
?>