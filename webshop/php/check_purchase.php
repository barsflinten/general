<?php

/*
Überprüfung und angleichung des Lagerbestndes nach eventuellen änderungen durch den user
*
*/

include 'setup.php';
include 'dev_log.php';


$ser_name="localhost";
$user_name="root";
$user_pass="";


$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");

$sql_check_puchase ="SELECT * FROM product_data WHERE id=".$_POST['product_id'];//Laden des Datensatzes des Artikels
$sql_check_puchase_result=mysqli_query($setup_connect, $sql_check_puchase);

while ($sql_check_puchase_reuslt_array =mysqli_fetch_assoc($sql_check_puchase_result))
{
     
    echo"Price ID ".$sql_check_puchase_reuslt_array['price_id']."<br>";
    $price_ID=$sql_check_puchase_reuslt_array['price_id'];
    echo"<br>";
    
     echo$sql_check_puchase_reuslt_array['stock'];
  
     if ( $_POST['quantety']>=0)//Falls eine Anzahl an Artikeln durch den User definert ist wird eine Prüfung des lagerbestandes veranlast
         
         
        {
        if( $sql_check_puchase_reuslt_array['stock']>=$_POST['quantety'])//überprüft ob gewünschte Anzahl von Artikeln auf lager ist
         
        {
        echo"possible";
        
     
        
        $newstock =$sql_check_puchase_reuslt_array['stock']-$_POST['quantety'];//erechnet neuen Lagerbestand
    
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        $sql_update_stock="UPDATE product_data SET 

        stock=?
        WHERE id=?
         ";
       
        $sql_update_stock_prepere =mysqli_prepare($setup_connect, $sql_update_stock);
        
        mysqli_stmt_bind_param($sql_update_stock_prepere, "si",
            
            
            $newstock,
            $_POST['product_id']
           
            
            
            );
        
        
        
        
         $sql_update_stock_execute=mysqli_stmt_execute($sql_update_stock_prepere);
            
        
     
         
        // $sql_1="SELECT * FROM admin WHERE id=$id";
        
         $ser_name="localhost";
         $user_name="root";
         $user_pass="";
         
         
         $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
         
      
        
         
         
         $sql_getprice="SELECT  price FROM prices WHERE id=".$price_ID.";";
        
     
        print_r($sql_getprice);
        
        $sql_getprice_results =mysqli_query($setup_connect, $sql_getprice);
        
        while ($sql_getprice_results=mysqli_fetch_assoc($sql_getprice_results)) 
        
        
        {
            
            $_SESSION[Q.$_POST['product_id']] =$sql_getprice_results['price']*$_POST['quantety'];
            $_SESSION['price'.$_POST['product_id']]=$sql_getprice_results['price'];
       
        }
     
         
        echo$price_ID;
        echo"Price ID ".$sql_check_puchase_reuslt_array['price_id']."<br>";
            echo"got updatet";
            
           
      
            
         

        
        
            foreach ($_POST as $entry=>$value)
                
            {
                
                $_SESSION[$entry.$_POST['product_id']] =$value;
           
                //$_SESSION[$summ.$_POST['product_id']]=$summ;
            }
              
           
            
     
           header("Location:index.php?japp");
        }
        
       
        elseif ($sql_check_puchase_reuslt_array['stock']<=$_POST['quantety'.$value])
                
                {
            
        
         
            foreach ($_SESSION as $key=>$value)
             {
            
                 $pattern1="/Q/";//Suchmsuster 1
                 $pattern2="/product_id/";//Suchmsuster 2
                  $pattern3="/quantety/";//Suchmsuster 3
              
                  if(preg_match($pattern1, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast.
            
                {
                
                
                echo"summe<input name=\"".$key."\"  class=\"margin_login_form_text_style\" type=\"text\" value=\"$value\"><br>";//ausgabe des grafischen Elementes
                 }
            
                if(preg_match($pattern2, $key))//Bei Übereinstimmungen der Schlüsselnamen mit dem Muster, Wird die Ausgabe des Grafischen elements veranlast.
            
                 {
                
                $ser_name="localhost";
                $user_name="root";
                $user_pass="";
        
                
                $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
                
                
                $get_item_stock="SELECT stock FROM product_data WHERE id=".$value;
                $get_item_stock_result=mysqli_query($setup_connect, $get_item_stock);
                
                while ($price =mysqli_fetch_assoc($get_item_stock_result))
                
                {
                    if ($price['stock']<$_POST['quantety'.$value])
                    
                    {
                        $_SESSION['quantety'.$value]=0;
                        echo$value;
                   
                        
         
                     header("Location:index.php?gut");
                    }
                    
                    else{
                        header("Location:index.php?ddd");
                    }
                }
                }
                 }}}}
                $_SESSION['cart']="set";//Sessionvariabel zur ausgabe des Einkaufswagens
                 
             header("location:index.php");
                 
         
        
