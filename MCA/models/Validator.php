<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author mohamed mokhtar
 */
class Validator {

    public static function isValidString($string)
    {
        $pattern ="/^[a-zA-Z\p{Cyrillic}0-9\s\-]+$/u";
        
        if(preg_match($pattern, $string))
                return true;
        else
            return false;
        
        
    }
     public static function isValideEmail($email)
    {
        $valid = filter_var($email,FILTER_VALIDATE_EMAIL);
        if($valid==false)
            return false;
        else
            return TRUE;
    }
     public static function isValidePhone($phone)
    {
        $valid = preg_match("/^[0-9]{11}$/", $phone);
        
        if($valid==false)
            return false;
        else
            return TRUE;
    }
     public static function isValidUrl($url)
    {
        $valid = filter_var($url,FILTER_VALIDATE_URL);
        if($valid==false)
            return false;
        else
            return TRUE;
    }
     public static function isValidInteger($int)
    {
        if($int == "0")
            return true;
        $valid = filter_var($int,FILTER_VALIDATE_INT);
        if($valid==false)
            return false;
        else
            return TRUE;
    }
     public static function isValidFloat($float)
    {
        if($float == "0"){
            return true;
        }
        $valid = filter_var($float,FILTER_VALIDATE_FLOAT);
        if($valid==false)
            return false;
        else
            return TRUE;
    }
     public static function isValidRequired($string)
    {
        if($string =="0")
            return true;
        $valid= !empty($string);

        if($valid == FALSE)
            return FALSE;
        else
            return TRUE;
    }
     public static function isValidDate($date)
    {
        if(!preg_match("/^([0]?[1-9]|[1-2][0-9]|3[0-1])-([0]?[1-9]|1[0-2])-[0-9]{4}$/", $date))
        {
            return FALSE;
        }
        $data = explode("-", $date);
       if(intval($data[2])<  intval(date("Y")))
           return false;
       else if (intval($data[2])>  intval(date("Y")))
           return true;
       else 
       {
               if(intval($data[1])<  intval(date("m"))) 
                   return false;
               else  if(intval($data[1])> intval(date("m"))) 
                   return true;
               else
               {
                    if(intval($data[0])<  intval(date("d")))
                        return false;
                    else 
                        return true;

               }

       }
      
        }
     public static function  isPlus($value)
    {
        if($value<0)
            return false;
        else
            return true;
    }
     public static function isInRange($min , $max,$value)
    {
        if($value >= $min && $value <= $max)
            return true;
        else
            return false;
    }
     public static  function isNan($string)
    {
        if($string == "0"){
            return false;
        echo $string;
        echo "return false;";
            
        }
       $valid = filter_var($string,FILTER_VALIDATE_INT);
       if($valid)
           return false;
       else
           return true;
    }

     public static function santasizeString($string)
    {
        $santasized= filter_var($string,FILTER_SANITIZE_STRING);
        return $santasized;
    }
    public function santasizeEmail($email)
    {
        $santasized= filter_var($email,FILTER_SANITIZE_EMAIL);
        return $santasized;
    }
     public static function santasizeUrl($url)
    {
        $santasized= filter_var($url,FILTER_SANITIZE_URL);
        return $santasized;
    }
     public static function santasizeInt($int)
    {
        $santasized= filter_var($int,FILTER_SANITIZE_NUMBER_INT);
        return $santasized;
    }
     public static function santasizeFloat($float)
    {
        $santasized= filter_var($float,FILTER_SANITIZE_NUMBER_FLOAT);
        return $santasized;
    }
     public static function validateArray($data,$rules)
    {
        $result;
        foreach ($rules as $key=>$rule)
        {
            $functions = explode('&', $rule);
            $result[$key]="";
            foreach($functions as $functionToCall)
            {
                if(!Validator::$functionToCall($data[$key]))
                $result[$key].=$functionToCall[strlen($functionToCall)-1];    
            }
        }
        return $result;
        
        
    }
     public static function cleantIt($string,$isUrl)
    {
        $string=trim($string);
        $string=  strip_tags($string);
        if(!$isUrl)
        $string=  stripslashes($string);

        $string=  htmlspecialchars($string);
        return $string;
        
    }
      public static function santasizeArray($data,$rules=null)
    {
      
           $result;
           if($rules==null)
           {
                foreach ($data as $key=>$value)
                {
                    $result[$key] = Validator::santasizeString($value);    
                    $result[$key] =  Validator::cleantIt($value , TRUE);    
                }
           }
           else 
           {
               foreach ($rules as $key=>$rule)
                   {
                   $functions = explode('&', $rule);
                   foreach($functions as $functionToCall)
                       {
                       $result[$key] = Validator::$functionToCall($data[$key]);    
                       $result[$key] =  Validator::cleantIt($data[$key], TRUE);    
                       }
                       
                       
                    }
                      
            }
        
        return $result;
            
    }
    
    
}