<?php


/*
 * Ersteller:Finn Bartel
 * Modul:Buan im Wintersemester 2019
 * 
 * Tutorials und Literatur:
 * 
 * preg_match Funktion: 
 * https://www.php.net/manual/de/function.preg-match.php
 * 
 * mysqli Prepared Statments 
 * 
 *Funktion der Datei                                                                                                                                                          //
 * In dieser PHP-Datei werden die Zuvor von backendRes.php bereitgestellten Daten �bertragen und Mittels einer Durchsuchung des Postarrays mit der preg_metch Funktion        //
 *  einem Datensatz in der Relation admin zugeortnent und anschli�dend aus sicherheitsgr�nden via MSQLI-prepared Statment in die Datenbank �bertragen                         //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 * */

include 'setup.php';
include 'dev_log.php';
include 'header.php';


echo"<div class=\"backend_alter_execute_customer.php\">";










foreach ($_POST as $key => $value) {//Schleife pr�ft mit Hilfe der Preg_match funktion die Schl�ssel im POST Array auf Das Muster ID und f�llt anschl�end ein Array mit den Dazugerh�rigen Werten der S
    {
    if (preg_match("/_ID__/", $key)) {//Pr�ft ob in schl�ssel des Post Arrays das Muster ID vorkommt
       
      
         

        {


    
    
    $ser_name="localhost";
    $user_name="root";
    $user_pass="";
    
    
    $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");

    
   
    $sql_query_alter_entry = "UPDATE customers SET 

    cv_name = ?,
    cn_name = ?,
    c_password = ?,
    c_day_of_brith = ?,
    c_mail = ?,
    c_banned = ?
    WHERE id=?";

  
    $sql_query_alter_entry_prepare =mysqli_prepare($setup_connect, $sql_query_alter_entry);




    $sql_bindparam= mysqli_stmt_bind_param($sql_query_alter_entry_prepare, "sssssss", 


        $_POST["_avname_".$value],
        $_POST['_an_name_'.$value],
        $_POST['_a_mail_'.$value],
        $_POST['_a_matnumber_'.$value],
        $_POST['a_password_'.$value],
        $_POST['a_banned_'.$value],
        $value
    
    
    );
    
    mysqli_stmt_execute($sql_query_alter_entry_prepare);
  echo"JobDone<br>";
   
}











$setup_connects = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
foreach ($_POST as $id =>$value)
{
    
    if (preg_match("/_ID__/", $key)) {//Pr�ft ob in schl�ssel des Post Arrays das Muster ID vorkommt
        
        
        
        
        {
            
    
    if ($setup_connect)
    {
        echo "connect";
    }
    
    
    $sql_query_alter_entry = "UPDATE adresses SET
        
    country =?,
    street = ?,
    postalcode =?,
    number = ?

    WHERE customer_id=?";
   
    
    
    
    $sql_query_alter_entry_preparec =mysqli_prepare($setup_connects, $sql_query_alter_entry);
    
  
    if($sql_query_alter_entry_preparec)
    {
        echo"done";
    }
    
    
    
    $sql_bindparam= mysqli_stmt_bind_param($sql_query_alter_entry_preparec, "sssss",
        
        
        $_POST['country'.$value],
        $_POST['postalcode'.$value],
        $_POST['street'.$value],
        $_POST['number'.$value],
        $value
        
        
        );
    
    mysqli_stmt_execute($sql_query_alter_entry_preparec);
    
   
}




header("Location:backend.php");





include 'footer.php';
    }
    header("Location:backend.php");
    }
    header("Location:backend.php");
    }
    }header("Location:backend.php");
    }
    ?>