<?php
include '../includes/autoLoader.php';
include "../models/functions.php"; 
if($_POST)
{
        $_POST = Validator::santasizeArray($_POST);
        try {
            $keys = " `st_Name`, `email`, `phone`, `faculty`, `departement`, `level`, `password`, `picture`";
            $str = "Register";
            
            $_POST['picture'] = $_FILES['picture']['name'];
            $informationToAdd = assignArrWKeys(array_diff($_POST, array("submit" => $str)), $keys);
            if ($informationToAdd == false)
                throw new Exception("<h2 class='sectionTitle error'>stop trying to hack this solid structure</h2>");
            $rules = array(
                "st_Name" => "santasizeString",
                "email" => "santasizeString",
                "phone" => "santasizeString",
                "faculty" => "santasizeString",
                "departement" => "santasizeString",
                "level" => "santasizeInt",
                "password" => "santasizeString",
                "picture" => "santasizeString",
            );
            $informationToAdd = Validator::santasizeArray($informationToAdd, $rules);
            $rules = array(
                "st_Name" => "isValidRequired&isValidString&isNan",
                "email" => "isValidRequired&isValideEmail&isNan",
                "phone" => "isValidRequired&isValidePhone",
                "faculty" => "isValidRequired&isValidString&isNan",
                "departement" => "isValidRequired&isValidString&isNan",
                "level" => "isValidRequired&isValidInteger&isPlus",
                "password" => "isValidRequired&isValidString",
                "picture" => "isValidRequired"
            );

            $errors = Validator::validateArray($informationToAdd, $rules);
            $isThereError = false;
            $errorsMessages;
            foreach ($errors as $key => $value) {
                if (!empty($value) && (strpos($value, "d") !== false)) {
                    $errorsMessages[$key] = "*";
                    $isThereError = true;
                } else if (!empty($value) && strpos($value, "d") == false) {
                    $errorsMessages[$key] = "the field is not valid";
                    $isThereError = TRUE;
                }
            }
            if (!empty($itemsToAdd['level']) && !$validator::isInRange(1, 7, $informationToAdd['level'])) {
                $errorsMessages['level'] = "the field is not valid";
            }
            $image = $_FILES['picture'];
            $imageName = $informationToAdd['email'] . "." . pathinfo($image['name'])["extension"];
            print($image['name']);

            if (!empty($image['name']))
                if (!doesAccept($imageName, array('jpg', 'png', 'bmp'))) {
                    $isThereError = true;
                    $errorsMessages['picture'] = "the file must be an image";
                }
            $registerObject = Register::createRegister($informationToAdd);
            if($registerObject->isRegistered())
            {
                 $errorsMessages['email'] = "this email is already registered";
                 $isThereError = true;
            }
                
            if ($isThereError) {
                include '../views/registerView.php';
            } else {

                $dir = "../resources/profile_pictures/";
                $path = $dir . $imageName;
                if (!file_exists($dir))
                    mkdir($dir,0755, true);
                if (!empty($image['name'])) {
                    $upload = new Upload();
                    $upload->uploadFile($image['tmp_name'], $path);
                    $upload = NULL;
                    $itemsToAdd['image'] = $path;
                }
              
               $registerObject->registerStudent($informationToAdd);


               


                if (!$isThereError) {
                {
                     session_start();
                     $_SESSION['userName_sm']=$informationToAdd['email'];
                     $_SESSION['userId']=$informationToAdd['st_id'];
                     $_SESSION['name'] = $informationToAdd['st_Name'];
                    header("location:../index.php");
                }
            }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

       
}
else
{
    
    header("location:../views/registerView.php");
}





