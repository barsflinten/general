<?php



/*
 * Diese PHP-Datei legt das übergebene Produktbild aus dem Formular auf Backend.php in das Verzeichnis productpics im rootverzeichnis des projektes ab 
 * und trägt gleichzeitig den Pfad zu der Datei in die Productrelation ein.
 * 
 * */
//https://www.youtube.com/watch?v=JaRq73y5MJk

include 'setup.php';
include 'dev_log.php';
include 'header.php';




print_r($_FILES) ;

if (isset($_POST['submitfile']))
    
{    $ser_name="localhost";
$user_name="root";
$user_pass="";



$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");
    
    
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
    
    
    
    $file=$_FILES['pic'];
    $file_name = $_FILES['pic']['name'];
    $file_temp_name = $_FILES['pic']['tmp_name'];
    $file_Error =$_FILES['pic']['error'];
    $file_type =$_FILES['pic']['type'];
    $file_size =$_FILES['pic']['size'];
    
    $file_extention=explode('.', $file_name);//speichert namen und formatkürzel in array ab
    $file_actual_extension = strtolower(end($file_extention));//setzt das Fromatkürzel (letztes element im array) in den Lowercase um handhabung zu erleichtern
    $allowd = array ('jpg','jpeg','png','pdf','JPEG','JPG','','');   
    
    if (in_array($file_actual_extension, $allowd))//überprüft ob Dateiformat ist in dem Alowed array vorhanden ist 
    
    {
        if ($file_Error ===0)//überprüft wert des schlüssels Error im Filearray auf fehler
        {
          
            if($file_size< 1000000000000)//überprüft größe der datei
            
            {
                $file_name_new =uniqid('',false).".".$file_actual_extension;
                
                $file_dest_dir='../productpics/'.$file_name_new;//neuer absolut adressierter pfad mit bezeichung (Unique ID verhindert die Überschreibung) 
                
                move_uploaded_file($file_temp_name, $file_dest_dir);
                
               echo"sucsess!";
            }
            
            else{
                echo"file is to big!";
            }
            
        }
        
        else 
            {
                echo"an error has accured";
            }
        
    }

    else 
    {
        echo"worng filetype";
    }


    
    if($setup_connect)
    
    {
        echo"CONNECT";
    }
    
    $sql_get_price ="SELECT id FROM  prices WHERE price =".$_POST['price']."";
    $sql_get_price_result= mysqli_query($setup_connect, $sql_get_price);
    
    
    
    while ($result =mysqli_fetch_array($sql_get_price_result))
    {   
        
        $id_result=$result['id'];
       
    }
  
    
    
    
    $set=0;
    $sql_insert_product_pic ="INSERT INTO product_data (imgdata,price_id,product_name,product_info_de,product_info_en,stock,a_banned)

     VALUES (?,?,?,?,?,?,?)";
    $sql_insert_product_pic_prepare = mysqli_prepare($setup_connect, $sql_insert_product_pic);
    mysqli_stmt_bind_param($sql_insert_product_pic_prepare, "sssssii",
        
        
        $file_name_new,
        $id_result,
        $_POST['productname'],
        $_POST['deu_beschreibungstext'],
        $_POST['engl_beschreibungstext'],
        $_POST['stock'],
        $set
        );
    mysqli_stmt_execute($sql_insert_product_pic_prepare);
    
    
    
   
    
    
    
    
}

header("Location:index.php");

include 'footer.php';

?>