<?php


include 'setup.php';





echo"<div class=\"header\">";









    if($_SESSION['user_stat']=="admin")/*if abfrage prüft ob user zugriff auf das backend erhält*/
    
    {
    echo"
        
    <form action=\"backend.php\" method=\"post\">
        
    <input class=\"button\" type=\"submit\" value=\"Backend\">
        
    </form>";
    
    echo"<form  action =\"index.php\" method =\"post\"> <input class=\"button\" type=\"submit\" value=\"Shop\"></form>";
    
    
  echo"</form>";
    
    }    
    
  
     echo"<form action=\"register.php\" method=\"post\">";

    


echo" <input class=\"button\" type=\"submit\" name=\"login\" value=\"Register\">
</form> 



 





";
   //ausgabe des Styleswitches
     echo"
<div><form action=\"#\" method=\"post\">
     
       <span>
        <input class=\"button\" type=\"submit\" name=\"css\" value=\"dark\"> 
        <input class=\"button\" type=\"submit\" name=\"css\" value=\"light\"> 
        </span>
     
     </form>     </div>




";

     
//ausgabe des Login buttons 
echo"
 <form action=\"login.php\" method=\"post\">



 <input class=\"button\" type=\"submit\" name=\"login\" value=\"Login\">
</form>  
";

//ausgabe des Logaut buttons 
echo"
<form action=\"logout.php\" method=\"post\">

 <input class=\"button\" type=\"submit\" name=\"login\" value=\"Logout\">

</form>  

";
//ausgbe der grafischen elemente und eingabemöglichkeitenn für den Einkauf
if ($_SESSION['user_stat']=="customer")
    
{
    echo"<a class=\"button\" href=\"#cart\">Cart</a>";
    echo"<form action=\"umsatz_monitor.php\" method=\"post\">";
   
    echo"<input class=\"button\" type=\"submit\" value=\"Umsatz\">";
    
    echo"</form>";
    
    
    echo"<form action=\"index.php\" method=\"post\">";
    
    echo"<input class=\"button\" type=\"submit\" value=\"Shop\">";
  echo"</div>";
    echo"<div class=\"child7\"><h7><span>Herzlich Wilkommen zurueck<h7></span><div>";
  echo"</form>";
 
 
    
}





if($_SESSION['user_stat']=="admin")/*if abfrage prüft ob user zugriff auf das backend erhält*/

{
echo"<div><span>Sie sind Admin</span></div>";

}

if($_SESSION['user_stat']!=="admin"&&$_SESSION['user_stat']==!"customer")
{
    echo"<div><span>Herzlichwilkommen!</span></div>";
}





echo"</div>";


?>