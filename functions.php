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
function printClient($name){
   echo "
   <li>
      <div class='row mt-1' >
         <div class='col-auto'>
            <img src='img\users\modulopgave 3 portrætter 1.png' alt='' style='width:50px;height:50px;' class='rounded'>
         </div>
         <div class='col'>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $name . "</span>
               </div>
               <div class='col'>
                  <span class='small'>Email</span>
               </div>
            </div>
            <div class='row'>
               <div class='col'>
                  <span class='small'>Kunde</span> 
               </div>
               <div class='col'>
                  <span class='small'>Tlf</span>
               </div>
            </div>
         </div>
      </div>
   </li>
   ";
}
function printEmployee($name){
   echo "
   <li>
      <div class='row mt-1' >
         <div class='col-auto'>
            <img src='img\users\modulopgave 3 portrætter 1.png' alt='' style='width:50px;height:50px;' class='rounded'>
         </div>
         <div class='col'>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $name . "</span>
               </div>
               <div class='col'>
                  <span class='small'>Email</span>
               </div>
            </div>
            <div class='row'>
               <div class='col'>
                  <span class='small'>Stilling</span> 
               </div>
               <div class='col'>
                  <span class='small'>Tlf</span>
               </div>
            </div>
         </div>
      </div>
   </li>
   ";
}