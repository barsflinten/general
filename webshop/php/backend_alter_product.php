<?php


/*Ersteller:Finn Bartel
 * Modul:Buan im Wintersemester 2019
 * 
 * diese PHP-Datei dient der Erfassung und Änderung des Ausgewählten produktes
 * Verwante Methoden: 
 * MYSQLI-Prepared-Statements
 * header Funktion
 * 
 */
include 'dev_log.php';
include 'setup.php';



$ser_name="localhost";
$user_name="root";
$user_pass="";


if(isset($_POST['a_banned']))
{
    $_SESSION['bannedsat']=1;
}
else 
{
$_SESSION['bannedsat']=0;
}
$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");




if(isset($_POST['peter']))
    
{
    

    
   
    
    
    
    
    $sql_query_alter_entry = "UPDATE product_data SET
        
    product_name =?,
    imgdata=?,
    product_info_de = ?,
    product_info_en =?,
    stock = ?,
    a_banned=?  
    WHERE id=?";
    
    $sql_query_alter_entry_prepare =mysqli_prepare($setup_connect, $sql_query_alter_entry);
    
    
    $sql_bindparam= mysqli_stmt_bind_param($sql_query_alter_entry_prepare, "sssssss",
        
        
        $_POST['name'],
        $_POST['peter'],
        $_POST['text_deu'],
        $_POST['text_engl'],
        $_POST['stock'],
        $_SESSION['bannedsat'],
        $_POST['id_']
        
        
        );
    
    mysqli_stmt_execute($sql_query_alter_entry_prepare);
    
  
    echo"Peter Meter";
    
}


elseif(isset($_POST['img_data'])){
    
    if($setup_connect)
    {echo"conn";}
    
    $sql_chck_prise= $sql_get_price ="SELECT id FROM prices WHERE price=".$_POST['price'];
    
    
    $sql_chec_price_query=mysqli_query($setup_connect, $sql_chck_prise);
    
    While($price = mysqli_fetch_assoc($sql_chec_price_query));
    {
        
        
        
     
        
        $ser_name="localhost";
        $user_name="root";
        $user_pass="";
        
        
        $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
        
        $sql_put_price="INSERT INTO prices (price) VALUES (?)";
        
        $sql_put_price_prep=mysqli_prepare($setup_connect, $sql_put_price);
        mysqli_stmt_bind_param($sql_put_price_prep, 's', $_POST['price']);
        mysqli_stmt_execute($sql_put_price_prep);
        
        echo"Preis hinzugefügt";
        
    }
    
    
$sql_query_alter_entry = "UPDATE product_data SET
    
    product_name =?,
    imgdata=?,
    product_info_de = ?,
    product_info_en =?,
    stock = ?,
    a_banned = ?
    WHERE id= ?";

$sql_query_alter_entry_prepare =mysqli_prepare($setup_connect, $sql_query_alter_entry);


    $sql_bindparam= mysqli_stmt_bind_param($sql_query_alter_entry_prepare, "sssssss",
    
    
    $_POST['name'],
    $_POST['img_data'],
    $_POST['text_deu'],
    $_POST['text_engl'],
    $_POST['stock'],
    $_SESSION['bannedsat'],
    $_POST['id_']
        );
        
        mysqli_stmt_execute($sql_query_alter_entry_prepare);
        
        
        
        
        
        $sql_get_price ="SELECT id FROM prices WHERE price=".$_POST['price'];
        $sql_get_price_query=mysqli_query($setup_connect, $sql_get_price);
        
        while ($price = mysqli_fetch_assoc($sql_get_price_query))
        {
          
            $ser_name="localhost";
            $user_name="root";
            $user_pass="";
            
            
            $setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
            
            $sql_alter_price_id="UPDATE product_data SET

            price_id = ?

            WHERE id = ?
            
            ";
            
            
            $sql_alter_price_id_prepare =mysqli_prepare($setup_connect, $sql_alter_price_id);
            
            
            if($setup_connect)
                
            {
                echo"<br>connect<br>";
            }
         //   if($sql_alter_price_id_prepare)
                
      //      {
         $sql_alter_price_id_prepare_bind =mysqli_stmt_bind_param($sql_alter_price_id_prepare, "si",
                    
                    
                 $price['id'],
                 $_POST['id_']
                    
                 );
                
         
         $sql_alter_price_ID_exeute= mysqli_stmt_execute($sql_alter_price_id_prepare);
                echo"price has been updatet";
            //}
            
            //else{
                echo"error";
           // }
            
            
        
    
         echo"No peter";
        }
}
 header("Location:backend.php")
    
 
    
   
?>