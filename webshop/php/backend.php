<?php

/*Ersteller:Finn Bartel
 * Modul:Buan im Wintersemester 2019
 * 
 * Diese Datei verk�pft alle Klassen, welche f�r die Funktionalit�t im Backend abgerufen werden soll
 * Es werden objekte initialisert und f�r das Ausf�hren der Funktionen genutzt
 * */
include 'setup.php';

include 'dev_log.php';
include 'header.php';
include 'class_customer.php';
include 'class_backend.php';
include 'class_upload.php';

include 'class_products.php';


echo"
</div>

<div>
<div><h1><span>Backend-Bereich<span></h1></div>
<div class=\"backend_body\">";


$backend_handler= new backend_handler;
$backend_handler->get_admins();


$backend_handler->new_admin();


$backend_handler->get_customers();




$customer=new customer();
$customer->cutommer_new_account();


$producthandler=new product();
$producthandler->alter_products();
echo"<div>";

echo"</div>";
$uploadmanager= new uploadclass();
$uploadmanager->upload();








echo"</div>";
echo"</div>";
echo"</div>";
unset($_POST['av_name_textfieled']);












$_SESSION["backandStat"] = "Isset";


echo "
    
    
    
    
    
</div>
</div>    
</div>    

</div>    
    
    
";

include 'footer.php';

?>