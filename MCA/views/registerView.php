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
            <label style="color:White;text-align: center">Register</label>
	<img src="../MCA.png" style="float:right; margin:15px;">
	</div> 
        <section id="login">
           <span class="error"><?php echo $message?></span>
            <form id="registerForm" name="registerForm" method="post" action="../controllers/register_c.php" autocomplete="on">
                <input class = "input-lg" id="name" name="name" type="text" placeholder="Enter your name here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your name here !'"  value="<?php if($errorsMessages['st_Name']==null)echo $informationToAdd['st_Name']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['st_Name'] ?></span></span>
                <input class = "input-lg " id="email" name="email" type="text"  placeholder="Enter E-mail here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter E-mail here !'" value="<?php if($errorsMessages['email']==null)echo $informationToAdd['email']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['email'] ?></span></span>
                <input class = "input-lg" id="phone" name="phone" type="text" placeholder="Enter your phone here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your phone  here !'"value="<?php if($errorsMessages['phone']==null)echo $informationToAdd['phone']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['phone'] ?></span></span>
                <input class = "input-lg " id="faculty" name="faculty" type="text"  placeholder="Enter faculty here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter faculty here !'" value="<?php if($errorsMessages['faculty']==null)echo $informationToAdd['faculty']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['faculty'] ?></span></span>
                <input class = "input-lg" id="department" name="department" type="text" placeholder="Enter your department here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your department here !'"value="<?php if($errorsMessages['departement']==null)echo $informationToAdd['departement']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['departement'] ?></span></span>
                <input class = "input-lg " id="level" name="level" type="number" min="1" max="7"  placeholder="Enter level here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter level here !'" value="<?php if($errorsMessages['level']==null)echo $informationToAdd['level']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['level'] ?></span></span>
                <input class = "input-lg " id="password" name="password" type="password"  placeholder="Enter password here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter password here !'" value="<?php if($errorsMessages['password']==null)echo $informationToAdd['password']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['password'] ?></span></span>
                <input class = "input-lg " title="Upload your profile picture" id="picture" name="picture" accept="image/*" type="file" style ="display: none" > 
               <label for="picture" class="input-lg custom-file-upload" onmousedown="this.style= 'box-shadow: .5px .6px 10px 1px #441253 '" onmouseup="this.style= 'box-shadow:none'" onmouseout="this.style= 'box-shadow:none'">Upload your profile picture</label><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['picture'] ?></span></span>
                <input class = "btn-lg button-A" id="registerBtn" type="submit" value="Register" onmousedown="this.classList.remove('button-A');this.classList.add('button-B');" onmouseup="this.classList.remove('button-B');this.classList.add('button-A');" onmouseout="this.classList.remove('button-B');this.classList.add('button-A');">
            </form>
            
            
            
        </section>

    </body>
</html>
