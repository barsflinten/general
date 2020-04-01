<?php


/*
 * Diese PHP-Datei verknüpft die einzelnen Kalssen und funktionen die für das Einloggen nötig sind
 * */
include 'setup.php';
include 'dev_log.php';
include 'header.php';
include 'class_customer.php';
//include 'class_customer.php';//Ausgabe und Komponenten In Class customer.php


/*identitäsprüfung
 * 
 * 
 * OPP klassen in class_customer.php
 * */


if($_SESSION['login']==="login")
{
    $customer_chek= new customer();
    $customer_chek->cutommer_ident_check();
}



if($_SESSION['login']=="register")
{
    $customer_chek= new customer();
    $customer_chek->cutommer_new_account();
    
    
}
echo"

<div class=\"body_place_order\">




</div>



";

//$customercheck = new customer();
//$customercheck->cutommer_ident_check();


include 'footer.php';


?>