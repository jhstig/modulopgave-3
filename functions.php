<?php

function connect() { //connect to DB
    global $conn; //set var to global
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS); //mysqli_connect(host,user,pw)
    if(!$conn) { //if not connected then kill (test if error)
        die(mysqli_error($conn));   //kill
    }
    mysqli_select_db($conn, DBNAME); //select DB that's to be used
}

function dirToArray($dir) {
   $result = array(); //tildeler array til result-variablen
   $cdir = scandir($dir, 1); //tildeler cdir mappestrukturen
   foreach ($cdir as $key => $value)    //loop der kører for hvert element i /files
   {
      if (!in_array($value,array(".","..")))    //tjekker om $value er mappe eller fil, hvis ja udfører den nedenstående (. og .. er en måde at navigere på)
      {
         if (is_dir($dir . "/" . $value))   //tjekker om den nuværende fil er en mappe
         {
            $result[$value] = dirToArray($dir . "/" . $value); //hvis ja tilføjes mappen som et associative array
         }
         else
         {
            $result[] = $value; //hvis den $value ikke er en mappe, tilføjes filnavnet til nuværende array
         }
      }
   }
   return $result;
}