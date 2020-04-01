<?php

/*Ersteller:Finn Bartel
 * Modul:Buan im Wintersemester 2019
 * verknüpfung von den Funktionen die zur änderung und bearbeitung der daten von Kunden und Andmins nötig sind
 * */

include 'setup.php';
include 'dev_log.php';
include 'header.php';
include 'class_backend.php';


echo"<div class=\"backend_body\">

";
$backend_handler =new backend_handler();
echo"
<h1>Ausgew&aumllte  Konten</h1><br><br>



";

if(isset($_POST['data'])==false)
    
{
$backend_handler->alter_admin();
}

else 
    
{
    $backend_handler->alter_customers();
}
echo"

</div>
</div>

";


include 'footer.php';



?>