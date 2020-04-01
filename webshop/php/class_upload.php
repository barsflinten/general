<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////
//Die Klasse Upload bildet die benötigte Funktionalität zum hochladen von Datein auf den Server ab ////
//Der hier verwendete Code basiert auf dem Buch PHP und MSQYL Das umfassende Handbuch von Christian/// 
//Wenz und Tobias Heuser im Reihnwerk Velag ISBN 987-3-8362-6395-5///
//////////////////////////////////////////////////////////////////////////////////////////////////////

class uploadclass 
{
    
    
    
    function upload() 
    
    {


        
    echo"<div><h1><span>Neuens Produkt anbieten</span></h1></div><br><br>";
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        $sql_get_products="SELECT * FROM prices";
        $sql_get_products_results =mysqli_query($setup_connect, $sql_get_products);//Datenbankverbindung
        
       
      
       
        
        echo"<div>";
    
        
      

    

             

        echo"
                 
                <div class=\"gma\">   
                <form class=\"delta\" action=\"uploadresult.php\" method=\"post\" enctype =\"multipart/form-data\">
                
                  
           
         
                 <div class=\"delta\"> 
                   
        <div>  
                 <input class=\"margin_login_form_text_style\" type=\"text\" name =\"productname\" placeholder=\"Produktnamen Eingeben\"><br>

                     </div>  
                

        ";
         
                   // echo"<input class=\"margin_login_form_text_style\" type=\"text\" name =\"engl_beschreibungstext\" placeholder=\"Produktbeschreibung Eingeben\"/";
                   
                    echo" <textarea rows=\"10\" cols=\"30\" class=\"margin_login_form_text_style\" name =\"engl_beschreibungstext\" placeholder=\"Produktbeschreibung Eingeben\"></textarea>";
                

             
               echo" </div>";
           
               

                 
                
               echo" <div class=\"gma\">";
               
               echo"<div>";
                //echo" <input class=\"margin_login_form_text_style\" type=\"text\" name =\"deu_beschreibungstext\" placeholder=\"Produktbeschreibung Eingeben\">";
                
               
               echo" <textarea rows=\"10\" cols=\"30\" class=\"margin_login_form_text_style\" name =\"deu_beschreibungstext\" placeholder=\"Produktbeschreibung Eingeben\"></textarea>";
                
               
              
                



                 
                
                 echo"<input class=\"\" type=\"text\" name =\"stock\" placeholder=\"Lagerbestand eingeben\">
                 
                 


    ";
                 
             echo"


                <div class=\"gma\">
                <input class=\"\" placeholder=\"Preis eingeben\" type=\"text\" name=\"price\">";
                
        



        //Eingabedialog zum Upload der Bilddatei 
                echo"<input type=\"file\"  name=\"pic\" placeholder=\"Preiseingeben\">
                
                <br><input class=\"button\" type=\"submit\" value=\"Upload\" name=\"submitfile\">
                
      </form>
        
      </div>
      </div>
      </div>
      </div>
    




     ";
   
    }
    
    
  

}

?>