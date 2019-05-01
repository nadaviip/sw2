<?php
if (!function_exists(assignArrWKeys))
{
   function assignArrWKeys($originalarr , $keys)
{
    
    $keys= str_replace("`", " ", $keys);
    $keys= str_replace(" ", "", $keys);
    $keys=trim($keys);
    $keys=  explode(",", $keys);
    if(count($originalarr)!=count($keys))
        return false;
    $result;
    $i=0;
    foreach($originalarr as $value)
    {
        $result[$keys[$i]]=$value;
        $i++;
        
    }
    return $result;

    
    
} 
}
if (!function_exists(doesAccept))
{
   function doesAccept($file , $extensions)
{
    
    $extension = pathinfo($file)['extension'];
    if(in_array(strtolower($extension), $extensions))
            return true;
        else 
            return false;
    
    
    
} 
}
if (!function_exists(getErrorMessages))
{
    function getErrorMessages($errors)
{
     $errorsMessages ;
     foreach($errors as $key=>$value)
     {
         if(!empty($value)&&(strpos($value,"d")!==false))
         {
              $errorsMessages[$key] = "*";
         }
                
         else if(!empty($value)&&strpos($value,"d")==false)
         {
             $errorsMessages[$key] = "the field is not valid";
         }
     }

         return $errorsMessages;
}
}

if (!function_exists(getFileToInclude))
{
    function getFileToInclude($file)
{
    if (is_file($file) && file_exists($file))
        return $file;
    else if(strpos($file, "../") !== false)
        return  str_replace("../", "", $file);
    else
        return "../".$file;
}

}
