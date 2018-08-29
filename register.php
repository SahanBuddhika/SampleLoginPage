<?php
      $con = mysqli_connect("localhost","root","") or die("Unable to connect");
    mysqli_select_db($con,"samplelogin");
?>

<DOCTYPE html>
<html>
    <head>
    <title>Sign Up Page</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color:#95a5a6">
    
        <div id="main-wrapper">
            <center>
                <h2>Sign Up Form</h2>
                <img src="image/50314474643932.jpg" class="pic"/>
            </center>
                <form class="myform" action="register.php" method="post">
                    <lable><b>Username</b></lable></br>
                    <input name="username" type="text" class="inputvalues" placeholder="Type Your User Name" required/></br>
                    <lable><b>Password</b></lable></br>
                    <input name="password" type="password" class="inputvalues" placeholder="Type Password" required/></br>
                    <lable><b>Confirm Password</b></lable></br>
                    <input name="cpassword" type="password" class="inputvalues" placeholder="Re-Enter Password" required/></br>

                    <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/></br>
                    <a href="index.php"><input name="back_btn" type="button" id="back_btn" value="<< Back "/></br></a>
                </form>


                <?php
                if(isset($_POST['submit_btn']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                
                    if($password==$cpassword)
                    {
                        $query = "select * from user WHERE username='$username'";
                        $query_run=mysqli_query($con,$query);
                            
                            if(mysqli_num_rows($query_run)>0)
                            {
                                //there is a alreadya user with the same name
                                echo '<script type="text/javascript"> alert("User already exists... try another username") </script>';
                            }
                            else
                            {
                                $query="insert into user values('$username','$password')";
                                $query_run = mysqli_query($con,$query);
                                
                                if($query_run)
                                {
                                     echo '<script type="text/javascript"> alert("User registered...Go to login page to login") </script>';
                                }else
                                {
                                     echo '<script type="text/javascript"> alert("Error !") </script>';
                                }
                            }
                    }else
                    {
                        echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';
                    }
                }
                ?>
        </div>
    </body>
</html>