<?php
//in dieser PHP-Datei wird die SESSION beendet und auf die Index.php umgeleitet
include 'setup.php';/*dient der Bekanntmachung der akktuellen Seshon*/
session_destroy();


header("Location:index.php");





?>