<?php
/*
 * Dieses Php Dokument beinhaltet die Klasse (backend_andler) welche die komplette funktionalität des backends abbildet
 * 
 */
include 'setup.php';
echo" <meta charset=\"UTF-8\">";

class backend_handler /*klasse die alle funktionaltät in bezug auf das backend enthält*/

{
    
    
    function get_admins()/*funktion zum auslesen aller adminaccouts aus der Datenbank*/
    
    {
        
        
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        $sql_1="SELECT * FROM admin";
        $customer_stat_1=mysqli_query($setup_connect, $sql_1);
        if($customer_stat_1)
        
        {
            
            
            echo"
                <form action=\"backendRes.php\" method=\"post\"> 
            <table class=\"table\">";/*ausgabe des Tabellenkopfes*/
            
            echo"<th>Regestrierete Admins</th>";
            echo"<tr>
                    <th>ID</th>
                   
                    <th>Vorname</th>
                    <th>Nachname</th>
                     <th>E-Mail</th>
                    <th>Password</th>
                    <th>Martrikelnummer</th>
                    <th>Gesperrt</th>
                    <th>Bearbeiten</th>
                    <tr>";
            echo"<tr>";
            
            while($entry =mysqli_fetch_assoc($customer_stat_1))/*erstellung von dynamischen arrays*/
            
            {
                
                
                $admin_id[]=$entry['id'];/*zuordnung des 1 eintrages in dem Datenfeld ID in das Array*/
                $admin_cv_name[]=$entry['av_name'];
                $admin_cnname[]=$entry['an_name'];
                $admin_c_password[]=$entry['a_password'];
                $admin_c_password[]=$entry['a_password'];
                $admin_c_mat_number[]=$entry['a_mat_number'];
                
                
                
                
                
                
                foreach($entry as $count)/*Nach abfrage des ersten eintrages wird dessen Ausgabe veranlasst*/
                
                
                
                {
                    
                   
                        
              
                    echo"<td class=\"table_cell\"><input type=\"text\" value=\"".$count."\"></td>";/*gibt abgefragte daten aus */
                   
                    
                }
                
                
                
                if($entry['id']==$_SESSION['User_ID'])
                
                {
                echo"<td class=\"table_cell\"><input type=\"text\"readonly placeholder=\"Schreibschutz\">";//übergabe der ID via Post arry
                echo"</tr>";
              
                
            
                }
                elseif($entry['id']!=$_SESSION['User_ID'])
                
                    { 
                 
                      
                    echo"<td class=\"table_cell\"><input type=\"checkbox\" name =\"".$entry['id']."\" value =\"".$entry['id']."\"></td>";//übergabe der ID via Post arry
                    echo"</tr>";
                }
                
                
            
            

          
            
        }
        echo"</table>";
        echo"<input class=\"button\" type=\"submit\"value=\"Eintraege bearbeiten\">
            
            </form>";
        

        
        }
    /*ende der Funktion get_admins*/
    }
    
    
   function new_admin()/*funktion zum eintagen eines neuen adminakkounts in die Datenbank*/
   
   {
       
       /*funktion und rückgabewert?*/
       
       $ser_name="localhost";
       $user_name="root";
       $user_pass="";
       
       $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
       
       

       if(isset($_POST['av_name_textfieled']))
       
      
           
       
       
       
       {
          
           $av_name_textfieled=$_POST['av_name_textfieled'];
           $an_name_textfieled=$_POST['an_name_textfieled'];
           $a_password=md5($_POST['a_password']);
           $a_mail=$_POST['a_mail'];
           $a_mat_numb=$_POST['a_mat_numb'];
           $a_status="0";
           
           $sql_query_new_custommer="INSERT INTO admin(av_name,an_name,a_password,a_mail,a_mat_number,a_banned) VALUES(?,?,?,?,?,?)";
           $sql_query_new_custommer_prepare=mysqli_prepare($setup_connect, $sql_query_new_custommer);
           
           if($sql_query_new_custommer_prepare)
           {
               $sql_query_new_custommer_bind=mysqli_stmt_bind_param($sql_query_new_custommer_prepare, "ssssss", $av_name_textfieled,$an_name_textfieled,$a_password,$a_mail,$a_mat_numb,$a_status);
               
               
               
               if($sql_query_new_custommer_bind&&$av_name_textfieled!="" && $an_name_textfieled!=""&& $a_password !="" && $a_mail &&$a_mat_numb !="")
               {
                   mysqli_stmt_execute($sql_query_new_custommer_prepare);
                   echo mysqli_insert_id($setup_connect);
               }
               
               
           }
           
      
       
       }
       
   
       
       /*ausgabe der grafischen elemente*/      
      echo"
            
                
          
            <form action=\"backend.php\" method=\"post\">
 <br><br>

                  
            <div class=\"register_form_new\">
             <div><h1><span>Neuen Admin Eintragen<span></h1></div>
            <br><br>
               
             <div class=\"margin_login_form\">        

             <div class=\"margin_login_form\">
             <input class=\"margin_login_form_text_style\" type=\"text\" name=\"av_name_textfieled\" placeholder=\"Vorname\" required> 
            </div>
            
            <div class=\"margin_login_form\">
             <input class=\"margin_login_form_text_style\" type=\"text\" name=\"an_name_textfieled\" placeholder=\"Nachname\" required> 
            </div>

                </div>

                 <div class=\"margin_login_form\">  
             <div class=\"margin_login_form\">
             <input class=\"margin_login_form_text_style\" type=\"text\" name=\"a_password\" placeholder=\"Passwort\" required> 
            </div>

             <div class=\"margin_login_form\">
             <input class=\"margin_login_form_text_style\" type=\"text\" name=\"a_mail\" placeholder=\"E-Mail\" required> 
            </div>
            
                </div>
            
             <div class=\"margin_login_form\">
             <input class=\"margin_login_form_text_style\" type=\"text\" name=\"a_mat_numb\" placeholder=\"Martrikelnummer\" required> 
            </div>
            
            <div class=\"\">
            
             <input class=\"button\" type=\"submit\" name=\"submit\" value=\"Eintragen\"> 
            <br><br>
             </div>
            
            
            </form>
       


            ";
       
       
       
       
       /*ende der funktion new_admin */
   }
   
   
   
   
   
   
   function alter_admin()
   {
     
          $ser_name="localhost";
          $user_name="root";
          $user_pass="";
          
       
          $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
       
          
          
         echo" <form action=\"backend_alter_execute.php\"method=\"post\">
        <table>
        <th>Admin ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>
        <th>Passwort</th>
        <th>Matrikelnummer</th>
        <th>Gesperrt</th>";
          foreach ($_POST as $id)
             
          {
          $sql_1="SELECT * FROM admin WHERE id=$id";
          
          $customer_stat_1=mysqli_query($setup_connect, $sql_1);
    
           if($customer_stat_1)
       
            {
           
           
       
       
           
                 echo"
                  
                <tr>";
                 
             
                 while($entry =mysqli_fetch_assoc($customer_stat_1))/*erstellung von dynamischen arrays*/
           
                 {
                     
                 $admin_id[]=$entry['id'];/*zuordnung des 1 eintrages in dem Datenfeld ID in ass Array*/
                 
                 $admin_cv_name[]=$entry['av_name'];
                 $admin_cnname[]=$entry['an_name'];
                 $admin_c_password[]=$entry['a_password'];
                
                 $admin_c_mat_number[]=$entry['a_mat_number'];
               
               
               
                echo"
                   <form action=\"backend_alter_execute.php\"method=\"post\">  
                    
              
           ";
               
               
         
                   
                   
                   //echo"<td class=\"table_cell\"><input type=\"text\" name =\"".$entry['id']."\"value=\"".$count."\"></td>";/*gibt abgefragte daten aus */
               
                   
                   
            
                   echo"<tr>";
                   echo"<td><input type=\"text\" name =\"_ID_ ".$entry['id']."\"value=\"".$entry['id']."\"  readonly></td>";
                   echo"<td><input type=\"text\" name =\"_avname_".$entry['id']."\"value=\"".$entry['av_name']."\"></td>";
                   echo"<td><input type=\"text\" name =\"_an_name_".$entry['id']."\"value=\"".$entry['an_name']."\"></td>";
                   
                   echo"<td><input type=\"text\" name =\"_a_mail_".$entry['id']."\"value=\"".$entry['a_mail']."\"></td>";
                   echo"<td><input type=\"text\" name =\"_a_matnumber_".$entry['id']."\"value=\"".$entry['a_mat_number']."\"></td>";
               
                   echo"<td><input type=\"text\" name =\"a_password_".$entry['id']."\"value=\"".$entry['a_password']."\"></td>";
                   echo"<td><input type=\"text\" name =\"a_banned_".$entry['id']."\"value=\"".$entry['a_banned']."\"></td>";
                   
                   echo"</tr>";
               
               echo"
               
       
            ";
               
               
               echo"</tr>
                

                ";
                }
            
            }
       
         
       }
       
       echo"


                </table>
                <input class=\"button\" type=\"submit\">
</form>



";
       
       
       
       //ender der Funktion alter_admin
   }
   
   
   
   
   
   

   
   
   
   function get_customers()/*funktion zum auslesen aller kunden aus der Datenbank*/
   
   {
       

       $row_count="";
       $ser_name="localhost";
       $user_name="root";
       $user_pass="";
       
       $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
       
       $sql_1="SELECT * FROM customers";
       $customer_stat_1=mysqli_query($setup_connect, $sql_1);
       if($customer_stat_1)
       
       {
          
           
           echo" <form action=\"backendRes.php\" method=\"post\"> ";
           echo" <input type=\"hidden\" name=\"data\" value=\"customer\"> "; //dient auf der Seite backendRes zur indentifikation und koreckten ausgabe der Daten 
           echo"<table class=\"table\">";/*ausgabe des Tabellenkopfes*/
          
           echo"<th>Regestrierete Kunden</th>";
           echo"<tr>
                    <th>ID</th>
                    <th>Profilfoto</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Password</th>
                    <th>Geburtztag</th>
                    <th>E-Mail</th>
                    <th>Gesperrt</th>
                    <th>Bearbeiten</th>
                    <tr>";
           echo"<tr>";
       
           
       
           
           while($entry =mysqli_fetch_assoc($customer_stat_1))/*erstellung von dynamischen arrays*/
             
           {
             
              
              $customer_id[]=$entry['id'];/*zuordnung des 1 eintrages in dem Datenfeld ID in das Array*/
              $customer_cv_name[]=$entry['cv_name'];
              $customer_cnname[]=$entry['cn_name'];
              $customer_c_password[]=$entry['c_password'];
              $customer_da_of_birth[]=$entry['c_day_of_brith'];
              $customer_cmail[]=$entry['c_mail'];
              
                 
              
                     foreach($entry as $count)/*Assioziatives Array wird ausgelesen startent Beim 1 tupels an stelle 0 des Arrays*/
                
               
                    {
                        
                         
                          
                    echo"
                        
                                       
    
                        <td class=\"table_cell\"><input class=\"table_input\" type=\"text\"   placeholder=\"".$count."\"readonly\"></td>";     /*gibt Inhalt des aktuell eingelesen Tupels aus und benennt es mit dem wert aus der ID des nutzers*/  
                    
                    
                    }     
                    echo"<td class=\"table_cell\"><input type=\"checkbox\" name =\"".$entry['id']."\" value =\"".$entry['id']."\"></td>";
           
          
                    echo"</tr>";
           }
               echo"</table><br>

         <input class=\"button\" type=\"submit\"value=\"Eintrag bearbeiten\"> 
      
        </form>";
               
               
       }
       
       /*ende der Funktion get_customers*/
   }
   
   
   
   public function cutommer_new_account()/*funktion zur erstellung eines neuen Kundenaccounts*/
   
   {
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
       $country_textfeld=$_POST['country_textfeld'];
       $postalcode_textfeld=$_POST['postalcode_textfeld'];
       $street_textfeld=$_POST['street_textfeld'];
       $number_textfeld=$_POST['number_textfeld'];
       
       if($_customer_pass==$register_pass_textfeld_verify && $_SESSION['sol_string']==$_POST['$sol_string'])
       
       {
           
           if($setup_connect&& $_customer_login!=="")
           {
               
               $sql_query_new_custommer="INSERT INTO customers(cv_name,cn_name,c_password,c_day_of_brith,c_mail) VALUES(?,?,?,?,?)";
               $sql_query_new_custommer_prepare=mysqli_prepare($setup_connect, $sql_query_new_custommer);
               
               if($sql_query_new_custommer_prepare)
               {
                   $sql_query_new_custommer_bind=mysqli_stmt_bind_param($sql_query_new_custommer_prepare, "sssss", $_customer_login,$_cusomer_nname,$_customer_pass,$day_of_birth_textfeld,$customer_email);
                   
                   
                   
                   if($sql_query_new_custommer_bind)
                   {
                       mysqli_stmt_execute($sql_query_new_custommer_prepare);
                       $_customer_login="";
                       
                       $lastID= mysqli_insert_id($setup_connect);
                   }
                   
                   
               }
               
              
               
           }
           
           else
           
           {
               echo"Fehler bei Verbindungsaufbau";
           }
           
           
           /*Eintragen in der Daten in die Relation adresses*/
           
           if($setup_connect)
           {
               
               $sql_query_new_custommer="INSERT INTO adresses (postalcode,street,number) VALUES(?,?,?)";
               $sql_query_new_custommer_prepare=mysqli_prepare($setup_connect, $sql_query_new_custommer);
               
               if($sql_query_new_custommer_prepare)
               {
                   $sql_query_new_custommer_bind=mysqli_stmt_bind_param($sql_query_new_custommer_prepare, "sss", $postalcode_textfeld,$street_textfeld,$number_textfeld);
                   
                   
                   
                   if($sql_query_new_custommer_bind)
                   {
                       mysqli_stmt_execute($sql_query_new_custommer_prepare);
                       echo mysqli_insert_id($setup_connect);
                      
                   }
              
                   
               }
               
           }
           
           else
           
           {
               echo"Fehler beim Eintragen der Daten in die Ralation Adresses";
           }
           
           echo"

  ";
           
           
       }
       header("Location:index.php");
      // session_destroy();
       /*ende der Funktion cutommer_new_account*/
   }
   
   
   
   function alter_customers()
   
   {
       
       
       $ser_name="localhost";
       $user_name="root";
       $user_pass="";
       
       
       $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
       
       
       
 
       
       
       
       foreach ($_POST as $id)
       
       {
           
           
           echo" <form action=\"backend_alter_execute_customer.php\"method=\"post\">
        <table>
        <th>Customer ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>
        <th>Passwort</th>
        <th>Geburtzdatum</th>
        <th>Gesperrt</th>";
           
           
           
           $sql_1="SELECT * FROM customers WHERE id=$id";
           
           $customer_stat_1=mysqli_query($setup_connect, $sql_1);
           
           if($customer_stat_1)
           
           {

               
               echo"<tr>";
              echo" <td>";
               
               while($entry =mysqli_fetch_assoc($customer_stat_1))/*erstellung von dynamischen arrays*/
               
               {
                   
              
                 
                   
                   
                   
                   echo"
                   <form action=\"backend_alter_execute_customer.php\"method=\"post\">
                       
                       
                    ";
                   
                   
                   
                   
                   
                   //echo"<td class=\"table_cell\"><input type=\"text\" name =\"".$entry['id']."\"value=\"".$count."\"></td>";/*gibt abgefragte daten aus */
                   
                   
                   
                   
                   echo"<tr>";
                   echo"<td><input type=\"text\" name =\"_ID_ ".$entry['id']."\"value=\"".$entry['id']."\"  readonly></td>";
                   echo"<td><input type=\"text\" name =\"_avname_".$entry['id']."\"value=\"".$entry['cv_name']."\"></td>";
                   echo"<td><input type=\"text\" name =\"_an_name_".$entry['id']."\"value=\"".$entry['cn_name']."\"></td>";
                   echo"<td><input type=\"text\" name =\"a_password_".$entry['id']."\"value=\"".$entry['c_password']."\"></td>";
                   echo"<td><input type=\"text\" name =\"_a_mail_".$entry['id']."\"value=\"".$entry['c_mail']."\"></td>";
                           
                   echo"<td><input type=\"text\" name =\"_a_matnumber_".$entry['id']."\"value=\"".$entry['c_day_of_brith']."\"></td>";
                   
                   
                   echo"<td><input type=\"text\" name =\"a_banned_".$entry['id']."\"value=\"".$entry['c_banned']."\"></td>";
                   
                   echo"</tr>";      
                   echo"</tr> ";

              
                     }
               
                      }
                  
                  
                  
                  
//AUSGABE DER ADRESSENRELATION                  
                  
       
                
                      $sql_1="SELECT * FROM adresses WHERE customer_id=$id";
                      
                      $customer_stat_1=mysqli_query($setup_connect, $sql_1);
                      
                      if($customer_stat_1)
                      
                      {
                          
                          
                          
                          
                          
                          echo"
                              
                <tr>";
                          
                          
                          while($entry =mysqli_fetch_assoc($customer_stat_1))/*erstellung von dynamischen arrays*/
                          
                          {
                         
                              echo"
                               <br>
                                <table>
                               <th></th>
                              <th>Land</th>
                              <th>Postleitzahl</th> 
                              <th>Strasse</th> 
                              <th>Hausnummer</th>           
                                  
                                 ";
                              
                              
                              
                              
                              
                              //echo"<td class=\"table_cell\"><input type=\"text\" name =\"".$entry['id']."\"value=\"".$count."\"></td>";/*gibt abgefragte daten aus */
                              
                              
                              
                              
                              echo
                              "<tr>";
                              echo"<td><input type=\"hidden\" name =\"customer_id".$entry['customer_id']."\"value=\"".$entry['customer_id']."\"></td>";
                              echo"<td><input type=\"text\" name =\"country".$entry['customer_id']."\"value=\"".$entry['country']."\"></td>";
                              echo"<td><input type=\"text\" name =\"postalcode".$entry['customer_id']."\"value=\"".$entry['postalcode']."\"></td>";
                              echo"<td><input type=\"text\" name =\"street".$entry['customer_id']."\"value=\"".$entry['street']."\"></td>";
                              echo"<td><input type=\"text\" name =\"number".$entry['customer_id']."\"value=\"".$entry['number']."\"></td>";
                              
                    
                              
                              
                             
                              echo"</tr>";
                              echo"</tr>
                             
                                  
                            ";
                          }
                          
                        }
                      }
       
       
       
       
       echo"
           


        
 </td>
           
                </table>
                <input class=\"button\" type=\"submit\">
</form>
           
           
           
";
       
       
       
       
       
       
       
       
       
       
       
       
       //ende der Funktion alter_cusomters
   }
   
   
   
   function get_products()/*funltion zum auslesen aller produktinformationen aus der Datenbank*/
   
   {
       
       /*ende der Funkttion get_produckts*/
   }




   
   
   
   
/*ende der klasse*/
}




  