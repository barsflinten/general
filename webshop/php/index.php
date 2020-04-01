<?php



require 'setup.php';
include 'dev_log.php';
include 'header.php';
include 'class_products.php';




echo"<div class=\"cart_master_1\>";
echo"<div class=\"cart_master\>";
echo"<div class=\"body_master\">";
echo"<div class=\"body_index\">";

//echo"<div class=\"master_container\">";
$getproductsnew=new product();
$getproductsnew->get_products();


echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";

        


include 'footer.php';







?>