<?php
/*
 * PHP-Datei zu regitratur im Onlinportal
 * 
 * */
include 'setup.php';
include'dev_log.php';
include'header.php';
include 'class_customer.php';




if ($_POST['login']=="Register")/*veranlasst die ausführung der entsprechenden methode in der Klasse custommer*/
{
    $_SESSION['login']="register";
}










echo"
<div class=\"body_register\">
    
   <div><h1><span>Registierung</span></h1></div></span>
    
      
             <form action=\"logedin.php\" method=\"post\">
    
    
    <div class=\"row\">

           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\" type=\"text\" name=\"register_vname_textfeld\" placeholder=\"Vorname\"required>  </div>
           
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"register_nname_textfeld\" placeholder=\"Nachname\"required> </div>
    </div>
           
     <div class=\"row\">
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"day_of_birth_textfeld\" placeholder=\"Geburtzdatum\"required> </div>
          
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"country_textfeld\" placeholder=\"Land\"required> </div>
    </div>

     <div class=\"row\">
            <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"postalcode_textfeld\" placeholder=\"Postleitzahl\"required> </div>

            <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"street_textfeld\" placeholder=\"Strasse\"required> </div>
     </div>
           
     <div class=\"row\">
             <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"number_textfeld\" placeholder=\"Hausnummer\"required> </div>

             <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"customer_email\" placeholder=\"E-Mail\"required> </div>

</div>

               <div class=\"row\">
 
             <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"password\" name=\"register_pass_textfeld\" placeholder=\"Passwort\"required>  </div>

          
            <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"password\" name=\"register_pass_textfeld_verify\" placeholder=\"Passwort wiederholen\"required>    </div>
           </div>    
                
            

 </div>
 
  ";

include 'class_captcha.php';
  
  echo "
            
     



</div>


   
</div>

";



include'footer.php';

?>