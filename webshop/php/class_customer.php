<?php
/*

Diese PHP-Dokument enthällt die Klasse customer, welche alle Funktionalität den User betreffend enthält

*/
include 'countries.php';



class customer{
    
    
 
    
    
    public function cutommer_ident_check()/*funktion zur identität feststellung =>auslagerung in seperate Klasse?*/
    
    
    {
        
      
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        
        $_customer_login=$_POST['login_textfeld'];/*initieren der Datenbank Verbindung*/
        $_customer_pass= md5($_POST['pass_textfeld']);
       // $_customer_pass= $_POST['pass_textfeld'];
     
      
        
        
        
    
        if ($setup_connect)
            
        {
          
            $sql="SELECT id FROM admin WHERE  av_name=\"$_customer_login\"AND a_password=\"$_customer_pass\"";//abfrage an den SQL-Server ob eingabe des users zugerotnen werden kann
            $customer_stat=mysqli_query($setup_connect, $sql);//hashen der Usereingabe
            
                if($customer_stat)
                
                {
              
                    while($entry =mysqli_fetch_assoc($customer_stat))
                   
                        
                        if($entry!=="")//wenn Ergebnis zurück kommt wird der Userstatus auf admin gesetzt
                            
                        {
                    $_SESSION['user_stat']="admin";
                  
               
                    
                    
                        $_SESSION['User_ID'] = $entry['id'];
                       
                    
                        }
                }
            
                
          }
        
     
          
                 $sql_1="SELECT id FROM customers WHERE  cv_name=\"$_customer_login\"AND c_password=\"$_customer_pass\"AND c_banned=0";//SQL-Anfrage zweks verifzerung und autentisierung des Users
                 $customer_stat_1=mysqli_query($setup_connect, $sql_1);
                
                 if($customer_stat_1)
                
                        {
                   
                        while($entry =mysqli_fetch_assoc($customer_stat_1))
                       
                            if($entry!=="")
                            
                            {
                            $_SESSION['user_stat']="customer";//übergbe des Kundenstatus in Sessionvarriable
                            $_SESSION['User_ID'] = $entry['id'];//übergbe der Kinden-ID in Sessionvarriable
                            
                       
                            }
                        }
                
                       
        
                        if ( $_SESSION['user_stat']==="admin" or $_SESSION['user_stat']==="customer" )/*if abfrage zur überprüfung und legitimation  (=== operator spezifiziert den fall) */
                            
                        {
                            echo"you have logged in";
                            header("Location:index.php");//weiterleitung auf index php 
                            exit();
                        }
                        
                       else
                        
                        {
                        header("Location:login.php");//userstatus belibt unbestimmt und und User wird zurück auf index php
                        $_SESSION['user_stat']="";
                        
                        }
    /*Ende der Funktion*/
    }
    
    
    
    public function cutommer_new_account()/*funktion zur erstellung eines neuen Kundenaccounts*/
   
    {
        
        $countries = array(//speicherung der länder in der EU
            
            "Deuschland",
            "England",
            "Portugal",
            "Spaninen",
            "Italien",
            "Griechenland",
            "Frankreich",
            "Belgien",
            "Luxemburg",
            "Niederlande",
            "Polen",
            "Schweiz",
            "Belgien",
            "Bulgarien",
            "Dänemark",
            "Estland",
            "Finnland",
            "Irland",
            "Kroatien",
            "Lettland",
            "Litauen",
            "Malta",
            "Malta",
            "Österreich",
            "Rumänien",
            "Slowakei",
            "Slowenien",
            "Tschechien",
            "Ungarn",
            "Vereinigtes Königreich",
            "Zypern",
        );
        
        
        /*PHP Buch Seite 600 ff*/
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        
        
        $_customer_login=$_POST['register_vname_textfeld'];/*initieren der Datenbank Verbindung*/
        $_customer_pass=$_POST['register_pass_textfeld'];
        $_cusomer_nname=$_POST['register_nname_textfeld'];
        $register_pass_textfeld_verify=$_POST['register_pass_textfeld_verify'];
        $day_of_birth_textfeld=$_POST['day_of_birth_textfeld'];
        $customer_email=$_POST['customer_email'];
        $country_textfeld=$_POST['country_select'];
        $postalcode_textfeld=$_POST['postalcode_textfeld'];
        $street_textfeld=$_POST['street_textfeld'];
        $number_textfeld=$_POST['number_textfeld'];
        $user_default_state=0;
    
        
        if($_customer_pass==$register_pass_textfeld_verify && $_SESSION['sol_string']==$_POST['$sol_string'])
        
        
        
        {
            
            if($setup_connect && $_customer_login!="")
            {
                
                $sql_query_new_custommer="INSERT INTO customers(cv_name,cn_name,c_password,c_day_of_brith,c_mail,c_banned) VALUES(?,?,?,?,?,?)";//übergabe der Daten an die Datenbank
                $sql_query_new_custommer_prepare=mysqli_prepare($setup_connect, $sql_query_new_custommer);
                
                if($sql_query_new_custommer_prepare)
                {    $hash=md5($register_pass_textfeld_verify);//hashen der eingabe zum sicheren speichern in der Datenbank
                    $sql_query_new_custommer_bind=mysqli_stmt_bind_param($sql_query_new_custommer_prepare, "ssssss", $_customer_login,$_cusomer_nname,$hash,$day_of_birth_textfeld,$customer_email,$user_default_state);
                    
                    
                    
                    if($sql_query_new_custommer_bind)
                    {
                        mysqli_stmt_execute($sql_query_new_custommer_prepare);
                        echo"ausgabe".mysqli_insert_id($setup_connect);
                        $forignKey=mysqli_insert_id($setup_connect);
                    }
                    
                    
                }
                
            }
            
            else
            
            {
              
            }
            
            
            /*Eintragen in der Daten in die Relation adresses*/
            
            if($setup_connect)
            {
                
                $sql_query_new_custommer="INSERT INTO adresses (customer_id,country, postalcode,street,number) VALUES(?,?,?,?,?)";//übergabe der Adressdaten an die Datenbank
                $sql_query_new_custommer_prepare=mysqli_prepare($setup_connect, $sql_query_new_custommer);
                
                if($sql_query_new_custommer_prepare)
                {
                    $sql_query_new_custommer_bind=mysqli_stmt_bind_param($sql_query_new_custommer_prepare, "sssss",$forignKey,$country_textfeld, $postalcode_textfeld,$street_textfeld,$number_textfeld);//mysqli_insert_id fügt dem Datenfeld customer ID den zugehörigen Primärschlüssel aus der Customer relation ein
                    
                    
                    
                    if($sql_query_new_custommer_bind&& $_customer_login!=""&&$_customer_pass!=""&&$_cusomer_nname!=""&&$register_pass_textfeld_verify!="")
                    {
                        mysqli_stmt_execute($sql_query_new_custommer_prepare);
                        
                    }
                    
                    
                }
                
            }
            
            else
            
            {
                echo"Fehler beim Eintragen der Daten in die Ralation Adresses";
            }
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
     
        
        echo"<br><br><div><h1><span>Neuen User erstellen<span></h1></div><br>";
        
        echo"
<div class=\"body_register\">
            
          
           
            
         <div class=\"register_form\">
            
             <form action=\"backend.php\" method=\"post\">
            
            
    <div class=\"row\">
            
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\" type=\"text\" name=\"register_vname_textfeld\" placeholder=\"Vorname\"required>  </div>
            
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"register_nname_textfeld\" placeholder=\"Nachname\"required> </div>
    </div>
            
     <div class=\"row\">
           <div class=\"margin_login_form\"> <input class=\"margin_login_form_text_style\"type=\"text\" name=\"day_of_birth_textfeld\" placeholder=\"Geburtzdatum\"required> </div>
             <div class=\"margin_login_form\"> <select name=\"country_select\">
                                            
                                                ";foreach ($countries as $country )//ausgabe der Länderauswahl
                                                 {
                                                     echo"<option value=$country>$country</option>";
                                                 };echo"                                                

                                                </select> 
            </div>
            
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
        
        
        
        
        
       
        
        
        
        
        
        //session_destroy();
        
        
   
       
    /*ende der Funktion cutommer_new_account*/
    }
    
  
    



};/*ende der klasse customer*/



/*logikbereich (ruft gewünschte funktion ab)*/

/*
 $new_customer = new customer();/*istanziert Klasse customer*/
/* $new_customer->cutommer_new_account();/*ruft funktion der klasse ab*/














