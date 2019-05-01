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
        <link href="styles/alarm.css" rel="stylesheet" type="text/css"/>
        <link href="icon.png" rel="icon"> 
    </head>
    <body id="index">
        <nav class="navbar navbar-inverse navbar_">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="MCA.png" style="float:right;"></a>
                </div>
                <ul class="nav navbar-nav">
                    
                    <li class=" active_ dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Notes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=controllers/viewNotes_c">View Notes</a></li>
                            <li><a href="?page=controllers/addNote_c">Add New Note</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">To-Do<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">View To-Dos</a></li>
                            <li><a href="#">Add New To-Do</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Schedule<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">View Time Tables</a></li>
                            <li><a href="#">Add New Time table</a></li>
                        </ul>
                    </li>
                    <li><a href="?page=views/alarmView">Timer</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo explode(" ", $_SESSION["name"])[0];;?> </a></li>
                    <li><a href="?page=controllers/logout_c"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
                </ul>
            </div>
        </nav>
            
        <header id="mainHeader">
            
        </header>
        <div class="clearfix"></div>
            
            <?php
                
            ?>
                
                
                <?php
                try {
                    $_GET = Validator::santasizeArray($_GET);
                    if ($_GET)
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
                    
                    
                    
        <footer id="footer">
            <address>
                All rights reserved - copyright Legendary Grand Master Team.
                    
            </address>
        </footer> 
            
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/moment.min.js" type="text/javascript"></script>
        <script src="js/alarm.js" type="text/javascript"></script>
    </body>
</html>