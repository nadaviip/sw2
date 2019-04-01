<?php
session_start();
if(isset($_SESSION['userName_sm']))
{
    header('Location:../index.php');
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
                 <meta charset="UTF-8">
        <title>MCA System</title>
        <meta name="description" content="my collage assistant system">
        <meta name="keywords" content="student, time management, scheduling">
        <meta name="author" content="Legendary Grand Master Team">
                <link href="../styles/fonts-min.css" rel="stylesheet" type="text/css"/>
                <link href="../styles/reset-min.css" rel="stylesheet" type="text/css"/>
                <link href="../styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
                <link href="../styles/styles.css" rel="stylesheet" type="text/css"/>
                <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
                <link href="../icon.png" rel="icon">
    </head>
    <body id="loginBody">
        
        
        
        
        <div class="bar">
            <label style="color:White;text-align: center">Login</label>
	<img src="../MCA.png" style="float:right; margin:15px;">
	</div> 
        <section id="login">
           <span class="error"><?php echo $message?></span>
            <form id="loginForm" name="loginForm" method="post" action="../controllers/login_c.php" autocomplete="on">
                <input class = "input-lg" id="email" name="email" type="text" placeholder="Enter your E-mail here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your E-mail here !'">
                <input class = "input-lg " id="userPassword" name="userPassword" type="password"  placeholder="Enter password here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter password here !'" >
                <input class = "btn-lg button-A" id="LoginBtn" type="submit" value="Login" onmousedown="this.classList.remove('button-A');this.classList.add('button-B');" onmouseup="this.classList.remove('button-B');this.classList.add('button-A');" onmouseout="this.classList.remove('button-B');this.classList.add('button-A');">
               
                <h1 ><a id="register-link" href="registerView.php">Don't have an account? </a></h1>
            
            </form>
            
            
            
        </section>

    </body>
</html>
