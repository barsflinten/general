<?php




/*
 * Die PHP datei dient der Überprüfung und visualisierung der Umsätze des Useres für den gewählten Monat
 * 
 * 
 * 
 * */
include 'setup.php';
include 'dev_log.php';
include 'header.php';


$ser_name="localhost";
$user_name="root";
$user_pass="";

$date=$_POST['month'].$_POST['year'];//Erstellt den aktuellen timestamp
$setup_connect = mysqli_connect($ser_name,$user_name,$user_pass,"bartels");//verbindung zum SQL-SERVER

$select_revenue ="SELECT prices_id FROM orders WHERE date BETWEEN 0".$date." AND 31".$date;//query welche alle einträge es useres dür den gewählten monat selektiert

$select_revenue_res =mysqli_query($setup_connect, $select_revenue);//Ergebnis der SQL-Abfrage


 while(  $entry = mysqli_fetch_assoc($select_revenue_res))//schreibt einzelen summen der posten zusammen
 {


foreach ($entry as $key=>$value)//zusammenzählen aller getätigten einkäufe im ausgewählten monat


{
   $summ+=$value;//Addierung der einzelnen posten
}
 }
$summe=$summ;//speichert die summe 



echo"<div class=\"thankyou_body\">";

echo"<div>";
//echo$summe;
echo"</div>";


switch($summe)// Überprüfung auf die aktuelle Boni Stufe
{
    case $summe>=1000 :$nextboni =500; 
    case $summe<=3000 :$nextboni =1000; 
    case $summe>=3000 :$nextboni =1500;

}



$sql_get_user_datat="SELECT * FROM customers WHERE id=".$_SESSION['User_ID'];
$sql_get_user_datat =mysqli_query($setup_connect, $sql_get_user_datat);//Ergebnis der SQL-Abfrage
$entry_userIDD=mysqli_fetch_assoc($sql_get_user_datat);

while ($entry_userID=mysqli_fetch_assoc($sql_get_user_datat))
    
{
 
    
    
}




echo"<div>";






$flaeche= imagecreate(1080,400);// vereinbarung der Hintergrundfläche

$flaeche= imagecreate(1080,400);// vereinbarung der Hintergrundfläche
$hintergrund = imagecolorallocate($flaeche,242,242,242);//Verinbarung der Hintergrundfarbe des Diagrams
$schriftfarbe = imagecolorallocate($flaeche,0,0,0);//Vereinbart farbe der schrift
$plaver_farbe = imagecolorallocate($flaeche,140,140,0);//farbe in der der Schrifzug des Spieles erscheint
$text = 'Gehaltsabrechnung :';//Vereinbart diagrammtietel
$monat="Rechnugsmonat ";
if($_POST['month']<10)

{
    $monat= $monat."0".$_POST['month'].".".$_POST['year'];
    $_SESSION['monat']=$monat;
}
    
else{
    $monat=$_POST['month'].".".$_POST['year'];
    $_SESSION['monat']=$monat;
}


$rot = imagecolorallocate($flaeche,255,0,0);
$farbe_treffer = imagecolorallocate($flaeche,0,255,0);//veinbart das ein kasten farbe_treffere farbe hat
imagefilledrectangle($flaeche,580,80,600,100,$farbe_treffer);//erzeugt einen grünen balken

//imagestring($flaeche,15,580,210,"Deine Trefferquote liegt bei ".$treffer_wert."%",$plaver_farbe);
imagestring($flaeche,15,400,20,$monat,$schriftfarbe);//gibt beschriftung aus

imagestring($flaeche,55,225,20,$entry_userIDD['cv_name']." ".$entry_userIDD['cn_name'],$plaver_farbe);


imagestring($flaeche,15,50,20,$text,$schriftfarbe);//gibt beschriftung aus
imagestring($flaeche,15,620,80,"Genrerierter Umsatz (".$summe.")",$schriftfarbe);//fügt in der Bildfläche an der Position 15,620,80 die anzahl der Punkte hinzu
$gruen = imagecolorallocate($flaeche,255,0,0);//definert farbe die auf der zeichenfläche zum einsatz kommt
imagefilledrectangle($flaeche,0,130,3000*1/100,170,$gruen);//ein grünes recheck wird erzeugt

imagestring($flaeche,30,620,160," Boni = (".$nextboni.")",$schriftfarbe);//ein schrifzug mit der Anzahl der gegebenen antworten wird erzeugt
$gruen = imagecolorallocate($flaeche,255,204,102);//ferbt untern Balken


imagefilledrectangle($flaeche,580,160,600,180,$rot);//ein grünes recheck wird erzeugt
imagefilledrectangle($flaeche,580,140,600,120,$gruen);
imagestring($flaeche,15,620,120," Grundgehalt = ("."3000".")",$schriftfarbe);//ein schrifzug mit der Anzahl der gegebenen antworten wird erzeugt

$punkte_je_prozent = 1 / 150;//skalierung der Prozentwerte
$x_abstand_unten_rechts1 =$summe * $punkte_je_prozent;
$y_abstand_oben_links1 = 102;
$farbe_treffer = imagecolorallocate ($flaeche,0,255,0);
imagefilledrectangle($flaeche,0,60,$x_abstand_unten_rechts1,112,$farbe_treffer);
$x_abstand_unten_rechts2 =$nextboni*$punkte_je_prozent;
$y_abstand_oben_links2 = 124;
$gruen = imagecolorallocate($flaeche,255,0,0);//ferbt untern Balken
imagefilledrectangle($flaeche,0,180,$x_abstand_unten_rechts2,224,$gruen);



$gruen = imagecolorallocate($flaeche,255,204,102);//ferbt untern Balken
imagefilledrectangle($flaeche,0,130,3000*1/100,170,$gruen);

imagepng ($flaeche, "../diagramme/Gehaltsabrechnung.png");//erzeugung des Diagramms
echo"<div class=\"padding_1\">";

 echo"<img src=\"../diagramme/Gehaltsabrechnung.png\">";// Ausgabe des Produktbildes

echo"</div>"; 

echo"<div>";
echo"<form action=\"get_pdf.php\" method=\"post\">";
echo"<input class=\"button\" type=\"submit\" value=\"PDF estellen\">";

echo"</form>";



echo"</div>";


echo"</div>";
echo"</div>";





include 'footer.php';