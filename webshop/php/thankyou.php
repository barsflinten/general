<?php


/*
 * Diese PHP-Datei dient der Eintragung des Einkaufes in die Relation orders, welche alle einzelen Posten der bestelllungen speichert und zu Berechnung der Boni dient
 * 
 * */

include 'setup.php';
include 'dev_log.php';
include 'header.php';




echo"<div class=\"thankyou_body\">";

$ser_name="localhost";
$user_name="root";
$user_pass="";


foreach ($_POST as $key=>$value) {//Für das erfassen der Daten wird das Postarray durchsucht

    $pattern ="/product_id/";//pattern für preg_match funktion zwecks daten filterung 
        
    
    if(preg_match($pattern, $key))//gefundenen Einträge werden erfasst und bearbeitet
        
    
    {

     $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");

    $sql_check_puchase ="SELECT id,price_id,product_name FROM product_data WHERE id=".$value;//Laden des Datensatzes des Artikels
    $sql_check_puchase_result=mysqli_query($setup_connect, $sql_check_puchase);

    while ($sql_check_puchase_reuslt_array =mysqli_fetch_assoc($sql_check_puchase_result))
    {
    
      // echo"Price ID ".$sql_check_puchase_reuslt_array['price_id']."<br>";
        $price_ID=$sql_check_puchase_reuslt_array['price_id'];
         echo"<br>";
    
        echo$sql_check_puchase_reuslt_array['stock'];
         
         
    
         if ( $_POST['quantety'.$value]>=0)//Falls eine Anzahl an Artikeln durch den User definert ist wird eine Prüfung des lagerbestandes veranlast
    
    
         {
        if( $_SESSION['quantety'.$value]!=$_POST['quantety'.$value])//überprüft ob gewünschte Anzahl von Artikeln auf lager ist
        
        {
          
            
            
            
            $newstock = $_SESSION['quantety'.$value] - $_POST['quantety'.$value];//erechnet neuen Lagerbestand
            
        
            
         echo"<br><br>stock aktuell:".$sql_check_puchase_reuslt_array['stock']."cart stock ". $_SESSION['quantety'.$value]."  neruer stock ".$newstock."";
            
           
            
            $_finalstock=$_SESSION['quantety'.$value]-$newstock;//korrigeirter Lagerbetsndt
            
            if($newstock>0)
            {
                $intermedate_stock=$newstock;
            }
            
            elseif($newstock<0) {
                $intermedate_stock=$newstock;
            }
         
            
            echo "<br>finaler Lagerbstand ".$intermedate_stock;
            echo"<br>". $_POST['product_id'.$value];
            echo"<br>".$intermedate_stock;
   
       
        
         
            
            
    if($intermedate_stock>0)//prüfung ob 
        
        
    {
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
                
                
                
                $intermedate_stock,
                $_POST['product_id'.$value]
                
                
                );
            
            mysqli_stmt_execute($sql_update_stock_prepere);
           // echo"lager abgezogen";
        }
        
        else
        {
       
       header("Location:index.php?nicht ausreichender Lagerbstand");
        }
        }
        }
        }
        }
}






foreach ($_POST as $key=>$value) {
    
    
    $pattern ="/product_id/";
    
    
    if(preg_match($pattern, $key))
    {
$date=$_POST['tag'].$_POST['monat'].$_POST['year'];//date("dnY");
$_sql_push_order ="INSERT INTO orders
    
        (date,
        custumer_id,
        product_data_id,
        prices_id,
        amount
    
        )
    
    
        VALUES (?,?,?,?,?)";

$sql_push_order_prpare=mysqli_prepare($setup_connect, $_sql_push_order);

$_sql_push_order_bind=mysqli_stmt_bind_param($sql_push_order_prpare, "siiii",
    
    
    
    
    $date,
    ($_SESSION["User_ID"]),
    $_POST["product_id".$value],
    $_SESSION["price".$value],
    $_POST["Q".$value]
    
    );

$sql_push_order_execute =mysqli_stmt_execute($sql_push_order_prpare);

//echo"<br>ABLE TO".$value."<br>";
//echo$_SESSION['User_ID']."<br>";
//echo$_SESSION['product_id'.$value]."<br>";
//echo$_SESSION['price'.$value]."<br>";
//echo$_SESSION['Q'.$value]."<br>";
}
//else{echo"<br>UNABLE";}

}



echo"<span><h1>Danke fuer ihren Einkauf</h1></span>";



echo"</div>";




include 'footer.php';





?>