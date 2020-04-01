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
 * In dieser PHP-Datei werden die Zuvor von backendRes.php bereitgestellten Daten übertragen und Mittels einer Durchsuchung des Postarrays mit der preg_metch Funktion        //
 *  einem Datensatz in der Relation admin zugeortnent und anschlißdend aus sicherheitsgründen via MSQLI-prepared Statment in die Datenbank Übertragen                         //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 * */

include 'setup.php';
include 'dev_log.php';
include 'header.php';


echo"<div class=\"backend_body\">";










foreach ($_POST as $key => $value) {//Schleife prüft mit Hilfe der Preg_match funktion die Schlüssel im POST Array auf Das Muster ID und füllt anschlßend ein Array mit den Dazugerhörigen Werten der S
  
    if (preg_match("/ID/", $key)) {//Prüft ob in schlüssel des Post Arrays das Muster ID vorkommt
       
      
        
        $primaryKeys [] =$value;// bei zutrffender Bedingung wird der Wert des jeweiligen schlüssels zum array $Primarykeys hinzugefügt im im nächsten Schritt die Änderungen in den Datensätzen vornehmen zu können 
       
        
    }
}


$ser_name="localhost";
$user_name="root";
$user_pass="";


$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");


foreach ($primaryKeys as $id =>$value)
{

    
 

    
   
    $sql_query_alter_entry = "UPDATE admin SET 

    av_name = ?,
    an_name = ?,
    a_mail = ?,
    a_password = ?,
    a_mat_number = ?,
    a_banned = ?
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
  
    echo$_POST['_an_name_'.$value];
    echo$value;
   // echo$_POST['_an_name_'.$value];
}





header("Location:backend.php");





include 'footer.php';






?>