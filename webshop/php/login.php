<?php
/*Loginformulad
 * 
 * 
 * 
 * 
 * 
 * */
include 'setup.php';
include'dev_log.php';
include'header.php';

if ($_POST['login']=="Login")/*veranlasst die ausführung der entsprechenden methode in der Klasse custommer*/
{
    $_SESSION['login']="login";
}

echo"
        <div class=\"body_index\">




                 <div class=\"register_form_new\">

                <form class=\"register\" action=\"logedin.php\" method=\"post\">

   
        
          <div><input class=\"margin_login_form_text_style\" type=\"text\" name=\"login_textfeld\" placeholder=\"Login\" >      </div>
          <div> <input class=\"margin_login_form_text_style\"type=\"password\" name=\"pass_textfeld\" placeholder=\"passwort\">    </div>
          <div> <input class=\"button\"type=\"submit\" value=\"Login\">                                  </div>

    </form>









";
echo"</div>";

include'footer.php';

?>