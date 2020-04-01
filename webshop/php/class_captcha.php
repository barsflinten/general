<?php

/* Dieses PHP-Dokument beinhaltet die Klasse capcha, welche die gesamte funktionalität in bezug auf die geforderte captcha-komponete ablidet*/


/*Die genutzte rand_array funktion, stammt aus dem Tutuorial , welches nachstehend verlinkt ist
 * tutorial-Random_funkt =https://www.php.net/manual/de/function.array-rand.php*/

 class captcha 
    
    {
    
        public function gen_captcha()/*Funkton zur Generierung eines neune captchas*/
        
        {
            
            $rad_number= array("1","2","3","4","5","6","7","8","9","0");
            
            $rand_num_string=array_rand($rad_number,4);
             $randnumber_1=$rad_number[$rand_num_string[0]];
             $randnumber_2=$rad_number[$rand_num_string[1]];
             $randnumber_3=$rad_number[$rand_num_string[2]];
             $randnumber_4=$rad_number[$rand_num_string[3]];
 
             
             $_SESSION['$sol_string']=$randnumber_1.$randnumber_2.$randnumber_3.$randnumber_4;
             
             echo"
             <div class=\"row\">
             
            <div class=\"register_form_captcha\">
            
            <div class=\"margin_login_form\">Um aus zu schlie&szligen, dass das Anmeldeformular maschinell ausgef&uumlllt wurde, l&oumlsen sie bitte das folgende Captcha </div>
            
            
            
            <div class=\"row\">
            
                <div class=\"captcha_pic\">
                
                 <img class=\"picture_limit\" src=\"../captcha/".$randnumber_1.".png\">
                 
                </div>
                
                <div class=\"captcha_pic\">
                
                 <img class=\"picture_limit\" src=\"../captcha/".$randnumber_2.".png\">
                
                </div>
                
                <div class=\"captcha_pic\">
                
                  <img class=\"picture_limit\" src=\"../captcha/".$randnumber_3.".png\">
                
                </div>
                
                <div class=\"captcha_pic\">
                
                     <img class=\"picture_limit\" src=\"../captcha/".$randnumber_4.".png\">
                  
                </div>
                
                
                
            </div>
            
            
                 
                 <div class=\"margin_login_form\">
                <input class=\"margin_login_form_text_style\" type=\"text\" name=\"capcha_text\" placeholder=\"Zahlen hier eingeben\">
                
              
                </div>
                
                
                
          
             
             <div class=\"margin_login_form\"> <input  class=\"button\" type=\"submit\" value=\"Register\">  </div>
             
         
</div> </form>";
           
       
        /*ende der funktion */
        
        }
        
      
        
        
        
    }/*ende der Klasse*/
    
    
    $new_cap=new captcha();/*instantierung der klasse captcha*/
    
    $new_cap->gen_captcha();/*initialisierung der funktion gen captcha*/
?>