<?php
    session_start();
?>

<DOCTYPE html>
<html>
    <head>
    <title>Home Page Page</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color:#95a5a6">
    
        <div id="main-wrapper">
            <center>
                <h2>Home Page</h2>
                <h3>Welcome <?php echo $_SESSION['username']?></h3>
                <img src="image/50314474643932.jpg" class="pic"/>
            </center>
                <form class="myform" action="homepage.php" method="post">
                  <a href="index.php">  <input name="logout" type="button" id="logout_btn" value="Log Out"/></br></a>
                </form>
                
                <?php
                    if(isset($_POST['logout']))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                ?>
        </div>
    </body>
</html>