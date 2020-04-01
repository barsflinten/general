<?php

/*
 * 
 * Setup von CSS Dateien, Styleswitch und Session
 * */

session_start();

header('Content-type: text/html; charset=utf-8');


echo"<!DOCTYPE html>";
echo"<head>";
echo"<meta charset=\"utf-8\">";
echo"<title>Q-Shop</title>";

echo"</head>";


$_SESSION['jahr'] =date("Y");//speichert das aktuelle Jahr in einer Sessionvarriable
$ser_name="localhost";
$user_name="root";
$user_pass="";
$zet;




if(!isset($_SESSION['css']))
     {
        
         $_SESSION['css'] ="light";
         echo "<link rel=\"stylesheet\" href=\"../css/".
             $_SESSION['css'].".css\" type=\"text/css\">";
             }
 else
     {
 
  $_SESSION['css'] = $_SESSION['css'];
  echo "<link rel=\"stylesheet\" href=\"../css/".
  $_SESSION['css'].".css\" type=\"text/css\">";
         
            
     }
     
     
     if(isset($_POST['css']))
         {
              $_SESSION['css'] = $_POST['css'];
              
              echo "<link rel=\"stylesheet\" href=\"../css/".
                  $_SESSION['css'].".css\" type=\"text/css\">";
         }
         
         if(!isset($_POST['css']))
         {
             $_SESSION['css'] = $_SESSION['css'];
             
             echo "<link rel=\"stylesheet\" href=\"../css/".
                 $_SESSION['css'].".css\" type=\"text/css\">";
         }


error_reporting(0);



echo"<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";//Vereinbarung des UTF 8 Raumes


?>