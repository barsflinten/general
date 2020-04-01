<?php
/*Ersteller:Finn Bartel
 * Modul:Buan im Wintersemester 2019
 * 
 * 
 * Überprüfung und der bestellmänge auf Durchführbarkeit 
 * Erstellung der Datumseingabemaske
 * 
 * 
 * 
 * */
include 'setup.php';
include 'dev_log.php';
include 'header.php';

echo"</form>";

echo"<div class=\"cart_check\">";//bleibt auch

echo"<div class=\"cart_new\">";//Ausgabe des Einkaufswagens




echo"<div class=\"cart_hader\">";
echo"<h4>";
echo"<span>";

echo"Abrechnung";

echo"</span>";
echo"</h4>";



echo"</div>";//bleibt stehen





echo"<div class=\"cointainer_cart\">";//bleibt stehen

foreach ($_POST as $key=>$value)//Duchsuchung des SESSION-Array nach relevanten Daten die PHP-Funktion preg_match() wird hierbei zur Filterung der Schlüsselpare und ihrer Werte verwendet

{
    

    
    $ser_name="localhost";
    $user_name="root";
    $user_pass="";
    
    $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
    
    
    $pattern1="/Q/";//Suchmsuster 1
    $pattern2="/product_id/";//Suchmsuster 2
    $pattern3="/quantety/";//Suchmsuster 3
    
    
    echo"<form action=\"thankyou.php\"  method=\"post\">";
    
    
    if(preg_match($pattern2, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast.
    
    {
        
        
        $sql_get_prices ="SELECT * FROM product_data WHERE id=".$value;//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
        $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
        
        
        while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
        
        
        {
            echo"<div class=\"chiled2\">";
            echo"<input name=\"".$key."\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
            echo"<span>Produktname: \"".$_POST['clear'.$value]."\"</span>";//<input name=\"clear".$value."\" class=\"margin_login_form_text_style\" type=\"text\" value=\"".$sql_get_products_result_values['product_name']."\"><br>";//ausgabe des grafischen Elementes
            
            echo"</div>";
            
        }
        
        
        $sql_get_prices ="SELECT price FROM prices WHERE id=".$value;//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
        $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
        
        
        while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
        
        {
            
            echo"<div class=\"chiled3\">";
            echo"<br><span> Preis: ".$_POST['Q'.$value]." Euro</span> <br>";//Preisausgabe
            echo"<input name=\"\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"".$sql_get_products_result_values['price']."\"><br>";//ausgabe des grafischen Elementes
            echo"<input type=\"hidden\" name=\"price".$value."\" value =\"".$sql_get_products_result_values['price']."\">";
            echo"</div>";
            
        }
        
        
        
        echo"<div class=\"chiled1\">";
        // echo"<span>Zwischenumme :".$value."</span>";//<input name=\"".$key."\"  class=\"margin_login_form_text_style\" type=\"text\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
        echo"<span>Zwischenumme :".$_SESSION['price'.$value]*$_POST['quantety'.$value]."</span>";//<input name=\"".$key."\"  class=\"margin_login_form_text_style\" type=\"text\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
        echo"</div>";
        echo"<input name=\"Q".$value."\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"".$_SESSION['product_id'.$value]*$_POST['quantety'.$value]."\"><br>";//ausgabe des grafischen Elementes
      
        

    }
    
    
    
   
    
    if(preg_match($pattern3, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast.
    
    {
        echo"<div class=\"chiled4\">";
        echo" <span>Stueck: ".$value."";//</span><input name=\"".$key."\" class=\"margin_login_form_text_style\" type=\"text\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
        echo"<input name=\"".$key."\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
        echo"</div>";
    }
    
    
    
    
}



echo"<form action=\"thankyou.php\"  method=\"post\">";

echo"<span>Rechnungsdatum</span>";

echo"<select name=\"tag\">";

echo"<option value=\"1\">01</option>";
echo"<option value=\"2\">02</option>";
echo"<option value=\"3\">03</option>";
echo"<option value=\"4\">04</option>";
echo"<option value=\"5\">05</option>";
echo"<option value=\"6\">07</option>";
echo"<option value=\"8\">08</option>";
echo"<option value=\"9\">09</option>";
echo"<option value=\"10\">10</option>";
echo"<option value=\"11\">11</option>";
echo"<option value=\"12\">12</option>";
echo"<option value=\"13\">13</option>";
echo"<option value=\"14\">14</option>";
echo"<option value=\"15\">15</option>";
echo"<option value=\"16\">16</option>";
echo"<option value=\"17\">17</option>";
echo"<option value=\"18\">18</option>";
echo"<option value=\"19\">19</option>";
echo"<option value=\"20\">20</option>";
echo"<option value=\"21\">21</option>";
echo"<option value=\"22\">22</option>";
echo"<option value=\"23\">23</option>";
echo"<option value=\"24\">25</option>";
echo"<option value=\"26\">26</option>";
echo"<option value=\"27\">27</option>";
echo"<option value=\"28\">28</option>";
echo"<option value=\"29\">29</option>";
echo"<option value=\"30\">30</option>";
echo"<option value=\"31\">31</option>";

echo"</select>";



echo"<select name=\"monat\">";
echo"<option value=\"01\">01</option>";
echo"<option value=\"02\">02</option>";
echo"<option value=\"03\">03</option>";
echo"<option value=\"04\">04</option>";
echo"<option value=\"05\">05</option>";
echo"<option value=\"06\">07</option>";
echo"<option value=\"08\">08</option>";
echo"<option value=\"09\">09</option>";
echo"<option value=\"10\">10</option>";
echo"<option value=\"11\">11</option>";
echo"<option value=\"12\">12</option>";
echo"</select>";





echo"<select name=\"year\">";
echo"<option value=\"".$_SESSION['jahr']."\">".$_SESSION['jahr']."</option>";
echo"</select>";






echo"<input  type=\"submit\" class=\"button\"  name=\"cart_check\" value=\"Bezahlen\">";

echo"</form>";






echo"<form  class=\"form\" action=\"index.php\" class=\"form\" method=\"post\">";
echo"<div class=\"form\">";
echo"<input class=\"button\" type=\"submit\" value=\"Zum Shop\">" ;
echo"</div>";
echo"</form>";














echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";







include 'footer.php';

?>