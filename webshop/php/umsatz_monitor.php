<?php

/*
 * Diese PHP_Datei dient der Erfassung des Abrechnungszeitraum für den die eintsprechenden Umsatzinformationen gesucht werden
 * 
 * 
 * 
 * */


include 'setup.php';
include 'dev_log.php';
include 'header.php';

$jahr =date("Y");
echo"<div class=\"thankyou_body\">";



echo"<span><h1>Monatsauswahl<h1></span>";
echo"<form action=\"umsatz_monitor_result.php\" method=\"post\">";


echo"<form action=\"umsatz_monitor_result.php\" method=\"post\">";

echo"<select name =\"month\">";

echo"<option value=\"1\">Januar</option>";
echo"<option value=\"2\">Feberbruar</option>";
echo"<option value=\"3\">März</option>";
echo"<option value=\"4\">April</option>";
echo"<option value=\"5\">Mai</option>";
echo"<option value=\"6\">Juni</option>";
echo"<option value=\"7\">Juli</option>";
echo"<option value=\"8\">August</option>";
echo"<option value=\"9\">September</option>";
echo"<option value=\"10\">Oktober</option>";
echo"<option value=\"11\">November</option>";
echo"<option value=\"12\">Dezember</option>";

echo"</select>";


echo"<select name=\"year\">";
echo"<option value=\"$jahr\">$jahr</option>";
echo"</select>";



echo"<input class=\"button\" type=\"submit\" value=\"Suchen\">";

echo"</form>";

echo"</div>";

include 'footer.php';