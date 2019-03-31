<?php
session_start();
if (!isset($_SESSION["userName_sm"])) {
    include 'includes/vars.php';

    header("location:controllers/login_c.php");
    die();
}
date_default_timezone_set("Africa/Cairo");
include'includes/autoLoader.php';
?>        
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MCA System</title>
        <meta name="description" content="my collage assistant system">
        <meta name="keywords" content="student, time management, scheduling">
        <meta name="author" content="Legendary Grand Master Team">
        <link href="styles/fonts-min.css" rel="stylesheet" type="text/css"/>
        <link href="styles/reset-min.css" rel="stylesheet" type="text/css"/>
        <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="styles/styles.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <link href="icon.png" rel="icon"> 
    </head>
    <body>
        <header id="mainHeader">



            <a href='' class="logoborder">  
                <div id="logo">
                </div>
            </a>
            <h3 id="welcome">Welcom  <?php echo $_SESSION["name"]; ?> <a href="?page=controllers/logout_c" class="btn btn-toolbar"><span class="glyphicon glyphicon-user"></span> Logout</a></h3>

        </header>
        <div class="clearfix"></div>
        <section id="container" >
            <?php
         
            ?>
            <section id="content">

                <?php
                try {
                    if ($_GET)
                        $_GET = Validator::santasizeArray($_GET);
                    if (isset($_GET['page']) && $_GET['page']) {
                        $url = $_GET['page'] . ".php";

                        if (is_file($url) && file_exists($url))
                            include $url;
                        else
                            echo"<h2 class='sectionTitle error'>ther requested file is not found</h2>";
                    } else
                        echo"<h2 class='sectionTitle'>Welcome to the application <br/><span class='smile'><span class='eye'>:</span>)</span></h2><div class='loading'>:::</div>";
                } catch (Exception $ex) {
                    $ex->getMessage();
                }
                ?>

            </section>
        </section>
        <footer id="footer">
            <address>
                All rights reserved - copyright Legendary Grand Master Team.

            </address>
        </footer> 

        <script src="js/toggle.js" type="text/javascript"></script>

    </body>
</html>