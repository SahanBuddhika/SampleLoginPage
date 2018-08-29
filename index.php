  <?php
    session_start();
    $con = mysqli_connect("localhost","root","") or die("Unable to connect");
    mysqli_select_db($con,"samplelogin");
?>

<DOCTYPE html>
<html>
    <head>
    <title>Login Page</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color:#95a5a6">
    
        <div id="main-wrapper">
            <center>
                <h2>Login Form</h2>
                <img src="image/50314474643932.jpg" class="pic"/>
            </center>
                <form class="myform" action="index.php" method="post">
                    <lable><b>Username</b></lable></br>
                    <input name="username" type="text" class="inputvalues" placeholder="Type Your User Name" required/></br>
                    <lable><b>Password</b></lable></br>
                    <input name="password" type="password" class="inputvalues" placeholder="Type Password" required/></br>
                    <input name="login" type="submit" id="login_btn" value="Login"/></br>
                    <a href="register.php"><input type="button" id="register_btn" value="Register"/></br></a>
                </form>
                <?php
                if(isset($_POST['login']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $query="select * from user WHERE username='$username' AND password = '$password'";
                    $query_run=mysqli_query($con,$query);
                    
                    if(mysqli_num_rows($query_run)>0)
                    {
                        //valid
                        $_SESSION['username']=$username;
                        header('location:homepage.php');
                    }
                    else
                    {
                        //invalid
                        echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
                    }
                }
        

                ?>
        </div>
    </body>
</html>