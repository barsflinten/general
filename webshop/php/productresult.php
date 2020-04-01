<?php

/*
 * Diese Php bildet die nötige Funktionalität zum Bearbeiten eines Artikels ab
 * 
 * 
 * */
include 'dev_log.php';
include 'setup.php';
include 'header.php';




$ser_name="localhost";
$user_name="root";
$user_pass="";

$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");


$sql_getproduct_res = "SELECT * FROM product_data WHERE id =".$_POST['id_']."";

$sql_getproduct_res_return =mysqli_query($setup_connect, $sql_getproduct_res);




While ($sql_get_products_result_got = mysqli_fetch_assoc($sql_getproduct_res_return))

{ 
 
   
   

 

    
    
   
   
  
    
    
    echo"<div class=\"row\">";
    echo"<div><h5><span>Produktbild</h5></div>";
    echo"<div>";
   
  echo"<img name=\"pic".$sql_get_products_result_got['id']."\"  class=\"product_pic_backend\" src=\"../productpics/".$sql_get_products_result_got['imgdata']."\">";
   
    
    echo"</div>";
    
    echo"<form action=\"backend_alter_product.php\" method=\"post\">";
    
    echo"<input type=\"hidden\" name=\"img_data\" value=\"".$sql_get_products_result_got['imgdata']."\">";
    echo"<input type=\"hidden\" name=\"id_\" value=\"".$sql_get_products_result_got['id']."\" >";
    echo"<div class=\"product_side_column\">";
    
    
    echo"<div><h5><span>Produktname</h5></div>";
    echo"<div>";
    echo "<input class=\"margin_login_form_text_style\" type=\"text\" name=\"name\"  value=\"".$sql_get_products_result_got['product_name']."\">";
    echo"</div>";
    
    
    echo"<div><h5><span>Deutscher Infotext</h5></div>";
    echo"<div>";
   // echo "<input class=\"margin_login_form_text_style\" type=\"text\" name=\"text_deu\"  value=\"".$sql_get_products_result_got['product_info_en']."\">";
    echo"<textarea rows=\"10\" cols=\"30\" name=\"text_deu\">".$sql_get_products_result_got['product_info_en']."</textarea>";
    
    echo"</div>";
    
    
    echo"<div><h5><span>Englischer Infotext</h5></div>";
    echo"<div>";
   // echo "<input class=\"margin_login_form_text_style\" type=\"text\" name=\"text_engl\"  value=\"".$sql_get_products_result_got['product_info_en']."\">";
   
    echo"<textarea rows=\"10\" cols=\"30\" name=\"text_engl\">".$sql_get_products_result_got['product_info_de']."</textarea>";
    
    echo"</div>";
    
    
    $sql_get_prices ="SELECT price FROM prices WHERE id=".$sql_get_products_result_got['price_id'];//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
    $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
    
    
    while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
    
    {
        echo"<div><span><h7>Preis</span</h7></div>";
        echo"<div>";
        echo"<input type=\"text\" name=\"price\" value=\"".$sql_get_products_result_values['price']."\">";//Preisausgabe
        echo"</div>";
        
    }
    
    
    
    echo"<div>";
    echo"<div><span><h7>Lagerbestand</span</h7></div>";
    echo "<input  class=\"margin_login_form_text_style\"type=\"text\" name=\"stock\"  value=\"".$sql_get_products_result_got['stock']."\">";
  echo"<br>";
  echo"<input type=\"checkbox\" name=\"a_banned\" >";echo"<h5><span>blockieren</span></h5>";
    
    echo"<input  class=\"button\"type=\"submit\" value=\"Speichern\">";
    

    
    echo"</div>";
    
    echo"</div>";
    echo"</div>";
    
 
    
    
    echo"</div>";
    echo"</div>";
    





}

$sql_product_pic_all="SELECT DISTINCT  imgdata FROM product_data";//vermeidet doppelte Ausgabe von Produktfotos
$sql_product_pic_query =mysqli_query($setup_connect, $sql_product_pic_all);

//$sql_product_pic_query_array = mysqli_fetch_array($sql_product_pic_query);


echo"<div class=\"\">";




while ($sql =mysqli_fetch_array($sql_product_pic_query))//im schleifenrupf werden submitbuttons generiert, welche zum tauschen der Bilder genutzt werden können
{

    
    echo"<div class =\"row\">";
    echo"




<div>
    <button type=\"submit\"class=\"\" name=\"peter\" value=\"".$sql['imgdata']."\">";
  //  echo" <img name=\"".$sql['imgdata']."\" src=\"../productpics/".$sql['imgdata']."\">";
    
    echo"<img name=\"".$sql['imgdata']."\" src=\"../productpics/".$sql['imgdata']."\"class=\"pic_selection\">";
    echo"</button>";
echo"</div>";
echo"</div>";

}


echo"</form>";
echo"</div>";




include 'footer.php';



?>