
<?php
    
    include('config/dbcon.php');

// logout

    if(isset($_POST['Logout_btn']))
    {
        session_start();
        unset($_SESSION['Logout_btn']);
        session_destroy();
        header('Location:login.php');
    }

// login form
    if(isset($_POST['login_btn']))
    {
        $roles = $_POST['role'];

        if($roles==="teacher")
        {
            $username = $_POST['uname'];
            $password = $_POST['password'];

            $query = "SELECT * FROM teacher WHERE uname='$username' AND password='$password' ";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                $_SESSION['status'] = "Logged In Successfully!";
                header('location: dashboard.php');
            }
            else
            {
            
                $_SESSION['status'] = "Invalid Email or Password.!";
                header('location: login.php');
            }
        }
        elseif($roles==="student")
        {
            $username = $_POST['uname'];
            $password = $_POST['password'];

            $query = "SELECT * FROM student WHERE uname='$username' AND password='$password' ";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                $_SESSION['status'] = "Logged In Successfully!";
                header('location: dashboard.php');
            }
            else
            {
            
                $_SESSION['status'] = "Invalid Email or Password.!";
                header('location: login.php');
            }
        }
        elseif($roles==="admin")
        {
            $username = $_POST['uname'];
            $password = $_POST['password'];

            $query = "SELECT * FROM admin WHERE name='$username' AND password='$password' ";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                $_SESSION['status'] = "Logged In Successfully!";
                header('location: dashboard.php');
            }
            else
            {
            
                $_SESSION['status'] = "Invalid Email or Password.!";
                header('location: login.php');
            }
        }
        else
        {
            echo "Please Select a Role.!";
            header('location: login.php');
        }

            
    }
    else
    {
      
        $_SESSION['status'] = "Access Denied.!";
        header('location: login.php');
    }


// add course
    if(isset($_POST['addCourse']))
    {
        $shortname = $_POST['shortname'];
        $fullname = $_POST['fullname'];
        $date = $_POST['date'];

        $coure_query = "INSERT INTO course (shortname,fullname,date) values ('$shortname','$fullname','$date')";
        $course_query_run = mysqli_query($con,$coure_query);
        if($course_query_run)
        {
            $_SESSION['status'] = "Course added Successfully!";
            header('location: Course.php');
        }else
        {
            $_SESSION['status'] = "Course Don't added!";
            header('location: Course.php');
        }
    }
// update course
    if(isset($_POST['updateCourse']))
    {
        $user_id = $_POST['user_id'];
        $shortname = $_POST['shortname'];
        $fullname = $_POST['fullname'];
        $date = $_POST['date'];

        $query = "UPDATE course SET shortname='$shortname',fullname='$fullname',date='$date' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status'] = "Course Updatted Successfully!";
            header('location: Course.php');
        }else
        {
            $_SESSION['status'] = "Course Don't Updatted!";
            header('location: Course.php');
        }
    }

    // Delete Course
if(isset($_POST['DeleteCoursebtn'])){

    $userid = $_POST['delete_id'];

    $query = "DELETE FROM course WHERE id='$userid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
        {
            $_SESSION['status'] = "Course Deleted Successfully!";
            header('location: Course.php');
        }else
        {
            $_SESSION['status'] = "Course Deleting Failed!";
            header('location: Course.php');
        }
}
// check teacher email

    if(isset($_POST['check_Emailbtn']))
    {
        $email = $_POST['email'];

        $checkemail = "SELECT email FROM teacher WHERE email='$email' ";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            echo "Email id already exist.!";
        }
        else
        {
            echo "It's available.";
        }

    }

//  add Teacher
    if(isset($_POST['addTeacher']))
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $eduDegree = $_POST['eduDegree'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $username = $_POST['uname'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmPassword'];
       
        if($password == $confirmpassword)
        {
            $coure_query = "INSERT INTO teacher (fname,lname,eduDegree,gender,address,dob,email,contact,uname,password)VALUE('$firstname','$lastname','$eduDegree','$gender','$address','$dob','$email','$contact','$username','$password')";
            $run = mysqli_query($con,$coure_query);
            if($run)
            {
                $_SESSION['status'] = "Teacher added Successfully!";
                header('location: Teacher.php');
            }else
            {
                $_SESSION['status'] = "Teacher Don't added!";
                header('location: Teacher.php');
            }
        }else
        {
            echo "Password or ConfirmPassword id not match";
        }
    }
    // update teacher
    if(isset($_POST['updateTeacher']))
    {
        $user_id = $_POST['user_id'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $eduDegree = $_POST['eduDegree'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $username = $_POST['uname'];
        $password = $_POST['password'];
        $query = "UPDATE teacher SET fname='$firstname',lname='$lastname',eduDegree='$eduDegree',gender='$gender',address='$address',dob='$dob',email='$email',contact='$contac',uname='$username',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status'] = "Taecher Updatted Successfully!";
            header('location: Teacher.php');
        }else
        {
            $_SESSION['status'] = "Teacher Don't Updatted!";
            header('location: Teacher.php');
        }
    }

      // Delete teacher
if(isset($_POST['DeleteTeacherbtn'])){

    $userid = $_POST['delete_id'];

    $query = "DELETE FROM teacher WHERE id='$userid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
        {
            $_SESSION['status'] = "Teacher Deleted Successfully!";
            header('location: Teacher.php');
        }else
        {
            $_SESSION['status'] = "Teacher Deleting Failed!";
            header('location: Teacher.php');
        }
}

//  add Subject
if(isset($_POST['addSubject']))
{
    $teachername = $_POST['tname'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication = $_POST['publication'];
    $publisher = $_POST['publisher'];
    
    $book = $_FILES['book'];
    $bookName = $book['name'];
    // Create a folder for the book
    $folderPath = 'books/' ;
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    // Get the temporary location of the uploaded book file
    $bookFileTemp = $_FILES['book']['tmp_name'];
    // Move the book file to the destination folder
    $bookFileName = $_FILES['book']['name'];
    $bookFilePath = $folderPath . '/' . $bookFileName;

    if (move_uploaded_file($bookFileTemp, $bookFilePath)) {
        // File moved successfully, store the book address in the database
        $coure_query = "INSERT INTO subject (tname,title,author,publication,publisher,book)VALUE('$teachername','$title','$author','$publication','$publisher','$bookFilePath')";
        $run = mysqli_query($con,$coure_query);
        if($run)
        {
            $_SESSION['status'] = "Teacher added Successfully!";
            header('location: Subject.php');
        }else
        {
            $_SESSION['status'] = "Teacher Don't added!";
            header('location: Subject.php');
        }
    } else {
        // Handle the case where the file move failed
        echo "Failed to move the book file.";
    }     

}

    // update subject
    if(isset($_POST['updateSubject']))
    {
        $user_id = $_POST['user_id'];
        $teachername = $_POST['tname'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publication = $_POST['publication'];
        $publisher = $_POST['publisher'];
        
        
            $query = "UPDATE subject SET tname='$teachername',title='$title',author='$author',publication='$publication',publisher='$publisher' WHERE id='$user_id'";
            $query_run = mysqli_query($con, $query);
            if($query_run)
            {
                $_SESSION['status'] = "subject Updatted Successfully!";
                header('location: Subject.php');
            }else
            {
                $_SESSION['status'] = "subject Don't Updatted!";
                header('location: Subject.php');
            }
        
    }


      // Delete subject
      if(isset($_POST['DeleteSubjectbtn'])){

        $userid = $_POST['delete_id'];
    
        $query = "DELETE FROM subject WHERE id='$userid' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
            {
                $_SESSION['status'] = "Teacher Deleted Successfully!";
                header('location: Subject.php');
            }else
            {
                $_SESSION['status'] = "Teacher Deleting Failed!";
                header('location: Subject.php');
            }
    }


    if(isset($_POST['check_email_student']))
    {
        $email = $_POST['email'];

        $checkemail = "SELECT email FROM student WHERE email='$email' ";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            echo "Email id already exist.!";
        }
        else
        {
            echo "It's available.";
        }

    }


//  add Student
if(isset($_POST['addStudent']))
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $fathername = $_POST['faname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmPassword'];
   
    if($password == $confirmpassword)
    {
        $coure_query = "INSERT INTO student (fname,lname,faname,gender,address,dob,email,contact,uname,password)VALUE('$firstname','$lastname','$fathername','$gender','$address','$dob','$email','$contact','$username','$password')";
        $run = mysqli_query($con,$coure_query);
        if($run)
        {
            echo '<script>alert("Student added successully.")</script>';
            header('location: Student.php');
        }else
        {
            echo '<script>alert("Record Failed.!")</script>';
            header('location: Student.php');
        }
    }else
    {
        echo "Password or ConfirmPassword id not match";
    }
}


    // update Student
    if(isset($_POST['updateStudent']))
    {
        $user_id = $_POST['user_id'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $fathername = $_POST['faname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $username = $_POST['uname'];
        $password = $_POST['password'];
        $query = "UPDATE student SET fname='$firstname',lname='$lastname',faname='$fathername',gender='$gender',address='$address',dob='$dob',email='$email',contact='$contac',uname='$username',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status'] = "Student Updatted Successfully!";
            header('location: Student.php');
        }else
        {
            $_SESSION['status'] = "Student Don't Updatted!";
            header('location: Student.php');
        }
    }

      // Delete Student
      if(isset($_POST['DeleteStudentbtn'])){

        $userid = $_POST['delete_id'];
    
        $query = "DELETE FROM student WHERE id='$userid' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
            {
                $_SESSION['status'] = "Student Deleted Successfully!";
                header('location: Student.php');
            }else
            {
                $_SESSION['status'] = "Student Deleting Failed!";
                header('location: Student.php');
            }
    }


    //Delete Picture
    if(isset($_POST['DeletePicbtn'])){

        $userid = $_POST['delete_id'];
    
        $query = "DELETE FROM images WHERE id='$userid' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
            {
                $_SESSION['status'] = "Student Deleted Successfully!";
                header('location: picture.php');
            }else
            {
                $_SESSION['status'] = "Student Deleting Failed!";
                header('location: picture.php');
            }
    }

    //Delete Video
    if(isset($_POST['DeleteVideobtn'])){

        $userid = $_POST['delete_id'];
    
        $query = "DELETE FROM videos WHERE id='$userid' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
            {
                $_SESSION['status'] = "Student Deleted Successfully!";
                header('location: video.php');
            }else
            {
                $_SESSION['status'] = "Student Deleting Failed!";
                header('location: video.php');
            }
    }


    // update admin
    if(isset($_POST['updateAdmin']))
    {
        $user_id = $_POST['user_id'];
        $shortname = $_POST['name'];
        $password = $_POST['password'];

        $query = "UPDATE admin SET name='$shortname',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status'] = "Course Updatted Successfully!";
            header('location: dashboard.php');
        }else
        {
            $_SESSION['status'] = "Course Don't Updatted!";
            header('location: dashboard.php');
        }
    }
    
?>