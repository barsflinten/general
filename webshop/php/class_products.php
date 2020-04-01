<?php
/*
 * 
 * Diese PHP-Datei bildet die gesamte Funktionalität welche die Produckte betreffen ab.
 * 
 * 
 * 
 * 
 * */



class product

{
    
    function get_products()//Gibt die angebotenen Produkte aus und stellt die benötigte Funktion führ den Wahrenkorb bereit
    {
        
    
       
   
        $ser_name="localhost";//servername
        $user_name="root";//user
        $user_pass="";//passwort
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");//vereinbarung der Verbindung zum SQL-Server
        
        
        $sql_get_products ="SELECT * FROM product_data WHERE a_banned=0";//Query an den SQL-Server (Produktdaten)
        $sql_get_products_result =mysqli_query($setup_connect, $sql_get_products);//Ausführung der Query
        echo"<div>";
        echo"<div class=\"maxcont\">";
        echo"<div class=\"maxcont_int\">";
        
        While ($sql_get_products_result_got = mysqli_fetch_array($sql_get_products_result))//der in dieser Schleife befindliche Coder wird Für jeden Artikel ausgeführt und stellt alle für den kauf nötigen Informationen zur verfügung
        
        {
            
       
          
            echo"<div class=\"product_display\">";
            
         
            echo"<div class=\"row_product_display\">";
           
                
                echo"<img class=\"product_pic\" src=\"../productpics/".$sql_get_products_result_got['imgdata']."\">";//Ausgabe des Produktbildes
                
          
            
        
       
           
           
                
                echo"<div class=\"row_pic_select\">";
            
           
             
                echo"<div><p>";
                echo"<span>".$sql_get_products_result_got['product_name']."</span>";//Ausgabe des Produknames
         
                echo"</p></div>";
         
                   
                echo"<div><p>";
                
            
                echo$sql_get_products_result_got['product_info_de'];//Ausgabe des deutschen Infotextes
                
                
                echo"</p></div>";
        
            
               echo"<div><p>";
            
               echo$sql_get_products_result_got['product_info_en'];//Ausgabe des englischen Infotextes
          
               echo"</p></div>";
           
           
               
               $sql_get_prices ="SELECT price FROM prices WHERE id=".$sql_get_products_result_got['price_id'];//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
               $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
               
               
               while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises 
               
               {
                   
                   
                   echo"<span>".$sql_get_products_result_values['price']." Euro</span>";//Preisausgabe
                   
               }
           
           
            echo"<p><div><span>Noch: ";
            
            echo$sql_get_products_result_got['stock'];//Ausgabe der im Lager vorhandenen Artikel
          
            echo" auf Lager</span></p></div>";
            
   
            
            
         
            
            if ($_SESSION['user_stat']=="customer")//Überprüft ob der User Kundenstatus hat bei positivem Ergebnis, wird das Bestellfeld im Artikelbereich bereitgestellt
       
        
            {
               
              
                
               
             
              
            }
            
            
            echo"<form action=\"check_purchase.php\" method=\"post\">";
            
            
            echo"<input type=\"text\" name=\"quantety\" placeholder=\"anzahl eingeben\">";//ausgabe der anzahl der bestellten artikel
            echo"<input type=\"hidden\" name=\"product_id\" value=\"".$sql_get_products_result_got['id']."\">";
            
            
            
            
            echo"<div>";
            echo"<input class=\"button\" type=\"submit\" value=\"In den Wahrenkorb\" name=\"add_to_cart\">";
            
            
            
            echo"</div>";
            echo"</form>";
          
            
            echo"</div>";
            echo"</div>";
            echo"</div>";
            echo"</div>";
        
        
        
        }
        
        
        
        
        if ($_SESSION['user_stat']=="customer"&& isset($_SESSION['cart']))//Prüft ob User kundenstatus hat. Bei positivem Ergebnis wird der Einkaufswagen auf der seite Index.php eingeblendet
        
        {
            echo"<a id=\"cart\">";
            echo"<div>";
            echo"<div class=\"flex_cont\>";
            echo"<div  class=\"cart\">";//Ausgabe des Einkaufswagens 
       
          
           
            echo"<div class=\"cart_weld\">";
            echo"<div class=\"cart_hader\">";
            echo"<h4>";
            echo"<span class=\"button\">";
         
            echo"Einkaufswagen";
            
            echo"</span>";
            echo"</h4>";
            echo"</div>";
          
            
            

            
            echo"<div class=\"cointainer_cart\">";
        
            echo"<form action=\"cart_check.php\" class=\"form\" method=\"post\">";
            echo"<div class=\"cart_master_container\">";
            foreach ($_SESSION as $key=>$value)//Duchsuchung des SESSION-Array nach relevanten Daten die PHP-Funktion preg_match() wird hierbei zur Filterung der Schlüsselpare und ihrer Werte verwendet
                
            {
                
      
                
               $pattern1="/Q/";//Suchmsuster 1
               $pattern2="/product_id/";//Suchmsuster 2
               $pattern3="/quantety/";//Suchmsuster 3
                
               
          
               
                
               if(preg_match($pattern2, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast.
               
               {
               
                   
                   $sql_get_prices ="SELECT product_name, price_id FROM product_data WHERE id=".$value;//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
                   $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
                   
                   
                   while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
                   
                   
                   {
                       echo"<div class=\"chiled2\">";
                       echo"<input name=\"".$key."\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
                       echo"<span>Produktname : </span><br><div class=\"button\">".$sql_get_products_result_values['product_name']."</div>";
                       echo"<input name=\"clear".$value."\" class=\"margin_login_form_text_style\" type=\"hidden\" value=\"".$sql_get_products_result_values['product_name']."\"><br>";//ausgabe des grafischen Elementes
                      
                       echo"</div>";
                       
                       
                
                   }
                   
                   
                   $sql_get_prices ="SELECT price FROM prices WHERE id=".$value;//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
                   $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
                   
                   
                   while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
                   
                   {
                       
                       echo"<div class=\"chiled3\">";
                       echo"<br><span> Preis: ".$_SESSION['price'.$value]." Euro</span> <br>";//Preisausgabe
                       echo"<span>Euro</span>";
                       echo"<input type=\"hidden\" name=\"price".$value."\" value =\"".$sql_get_products_result_values['price']."\">";
                     
                       echo"</div>";
                       
                       
                   }
                   
                   echo"<div class=\"chiled3\">";
                  // echo"<br><span> Preis: ".$_SESSION['price'.$value]." Euro</span> <br>";//Preisausgabe
                   echo"<input type=\"hidden\" name=\"price".$value."\" value =\"".$sql_get_products_result_values['price']."\">";
                 
                   
                   echo"</div>";
                   
                     }
                
                
                
                if(preg_match($pattern1, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast. 
               
               
                
                {
                   // echo"<div class=\"chiled1\">";
                    echo"<input name=\"".$key."\"  class=\"margin_login_form_text_style\" type=\"hidden\" value=\"$value\"><br>";//ausgabe des grafischen Elementes 
                  //  echo"</div>";
                  
                   
                
                }
                
               
                
                if(preg_match($pattern3, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast. 
                
                {   
                    echo"<div class=\"chiled4\">";
                    echo" <span>Stueck: </span><input name=\"".$key."\" class=\"margin_login_form_text_style\" type=\"text\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
                    echo"</div>";
                
                }
                
               
   
                
            }
            
            echo"<div class=\"containder_form\">";
            echo"<div class=\"chiled5\"><input class=\"button\" type=\"submit\" name=\"cart_check\" value=\"zur Kasse\"></div>";//ausgabe eines Submitbuttons
            echo"</div>";
   
       
            echo"</div>";//abschluss des Div
            echo"</div>";//abschluss des Div
            echo"</div>";//abschluss des Div
            echo"</div>";//abschluss des Div
          
            
            
            echo"</div>";//abschluss des Div
  
        
          
        }
      
   
    
    }//ende der funktion get Products
    
    
    
    function alter_products() //Funktion zum Abendern und Bearbeiten der Produktposten
   
    { 
        echo"</from>";

        echo"<div><br><br>";
        echo"<h1><span>Aktuelles Angebot</span></h1>";
        echo"</div>";

        
   
        $ser_name="localhost";//servername
        $user_name="root";//user
        $user_pass="";//passwort
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");//Vereinbarung der zu nutzenden Datenbankverbindung
        
        
        $sql_get_products ="SELECT * FROM product_data";//SQL-Query and den Datenbankserver
        $sql_get_products_result =mysqli_query($setup_connect, $sql_get_products);//ergebnis der SQL-Query
        
       
        
     
        
      
        
        While ($sql_get_products_result_got = mysqli_fetch_assoc($sql_get_products_result))//Ausgabe von Bearbeitungsmaske des zu bearbeitenden Artikels
        
        {
       
            echo"<div class=\"register_form\">";
            
         
            
 
            
            
            echo"<div><h5><span>Produktbild</h5></div><br>";
            echo"<img name=\"pic".$sql_get_products_result_got['id']."\"  class=\"product_pic_backend\" src=\"../productpics/".$sql_get_products_result_got['imgdata']."\">";// Ausgabe des Produktbildes
           echo"<input type=\"hidden\" name=\"picture_data\" value=\"\">";

        
            
        echo"<div class=\"delta\">";
        echo"<form class=\"delta\" action=\"productresult.php\" method=\"post\">";
            
            echo"<input type=\"hidden\" name=\"id_\"".$sql_get_products_result_got['id']."\" value=\"".$sql_get_products_result_got['id']."\"readonly >";//Ausgabe der ProduktID
            echo"<div class=\"product_side_column\">";
     
          
         ;
            echo"<div><h5><span>Produktname</h5></div>";
            echo "<input  readonly class=\"margin_login_form_text_style\" type=\"text\" name=\"name".$sql_get_products_result_got['id']."\"  value=\"".$sql_get_products_result_got['product_name']."\"readonly>";//Ausgabe des Produktnamens
           
            echo"</div>";
        
            
          
            echo"<div>"; 
            //echo "<input class=\"margin_login_form_text_style\" type=\"text\" name=\"text_deu".$sql_get_products_result_got['id']."\"  value=\"".$sql_get_products_result_got['product_info_en']."\"readonly>";//Ausgabe des englischen beschreibungstext  
            echo"<div><h5><span>Info-Text Deutsch</h5></div>";
            echo "<textarea    readonly rows=\"10\" cols=\"30\" class=\"margin_login_form_text_style\"  name=\"text_deu".$sql_get_products_result_got['id']."\">".$sql_get_products_result_got['product_info_en']."\"</textarea>";//Ausgabe des englischen beschreibungstext  
            
            echo"</div>";
        
            
      
            echo"<div>";
            echo"<div><h5><span>Info-Text Englisch</h5></div>";
          //  echo "<input class=\"margin_login_form_text_style\" type=\"text\"name=\"text_engl".$sql_get_products_result_got['id']."\"  value=\"".$sql_get_products_result_got['product_info_de']."\"readonly>";//Ausgabe des englischen beschreibungstext  
            echo "<textarea readonly rows=\"10\" cols=\"30\" class=\"margin_login_form_text_style\" name=\"text_engl".$sql_get_products_result_got['id']."\">".$sql_get_products_result_got['product_info_de']."\"</textarea>";//Ausgabe des englischen beschreibungstext  
            echo"</div>";
       
        
            echo"<div>";
          
            echo"<div><h5><span>Preis in EURO</h5></div>";
            $sql_get_prices ="SELECT price FROM prices WHERE id=".$sql_get_products_result_got['price_id'];//Query an den SQL-Server (Preis in Abhänigkeit vom Artikel)
            $sql_get_products_price_result =mysqli_query($setup_connect, $sql_get_prices);//Ausführung der Query
            
            
            while ($sql_get_products_result_values=mysqli_fetch_array($sql_get_products_price_result)) //Ausgabe des Preises
            
            {
                
                echo"<div>";
              
                echo"<input type=\"text\" value=\"".$sql_get_products_result_values['price']."\"readonly>";//Preisausgabe
              
                echo"</div>";
                echo"</div>";
                
                
            }
            
            echo"<div><h5><span>Lagerbestand</h5></div>";
            echo "<input  class=\"\"type=\"text\" name=\"stock".$sql_get_products_result_got['id']."\"  value=\"".$sql_get_products_result_got['stock']."\"readonly>";//Ausgabe des Lagerbestandes
            
            echo"</div>";
            
            echo"<div>";
            echo"<input class=\"button\" type=\"submit\" value=\"Produkt bearbeiten\">";
 
            echo"</div>";
           
            echo"</div>";
            echo"</div>";
    
      
            
            echo"</form>";
      
          
           
      
     
   
        
        }
     
    
    
    }
    
   
} //Einde der Kalsse product



?>