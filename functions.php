<?php
$conn;

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
function printClient($client_id, $client_user_id){
   $fullname = getClientUser($client_id)[$client_user_id]['firstname'] . " " . getClientUser($client_id)[$client_user_id]['lastname'];
   $email = getClientUser($client_id)[$client_user_id]['email'];
   $telephone = getClientUser($client_id)[$client_user_id]['telephone'];
   $client = getClient($client_id)[0]['name'];
   if(!empty(getClientUser($client_id)[$client_user_id]['portrait'])) {
      $portrait = "img/users/" . getClientUser($client_id)[$client_user_id]['portrait'];
   } else {
      $portrait = "https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255710-stock-illustration-avatar-vector-male-profile-gray.jpg";
   }
   
   echo "
   <li>
      <div class='row mt-1 justify-content-between text-light' >
         <div class='col-auto'>
            <img src='" . $portrait . "' alt='' style='width:50px;' class='rounded-circle mx-auto'>
         </div>
         <div class='col bg-dark rounded mr-3'>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $fullname . "</span>
               </div>
               <div class='col'>
                  <span class='small'>" . $email . "</span>
               </div>
            </div>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $client . "</span> 
               </div>
               <div class='col'>
                  <span class='small'>" . $telephone . "</span>
               </div>
            </div>
         </div>
      </div>
   </li>
   ";
}
function printEmployee($user_id){
   $fullname = getUser($user_id)[0]['firstname'] . " " . getUser($user_id)[0]['surname'];
   $email = getUser($user_id)[0]['email'];
   $position_id = getUser($user_id)[0]['position_id'];
   $position = getPosition($position_id)[0]['position'];
   $telephone = getUser($user_id)[0]['telephone'];
   //$portrait = getUser($user_id)[0]['portrait'];
   if(!empty(getUser($user_id)[0]['portrait'])) {
      $portrait = "img/users/" . getUser($user_id)[0]['portrait'];
   } else {
      $portrait = "https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255710-stock-illustration-avatar-vector-male-profile-gray.jpg";
   }
   echo "
   <li>
      <div class='row mt-1 justify-content-between text-light' >
         <div class='col-auto'>
            <img src='". $portrait ."' alt='' style='width:50px;height:50px;' class='rounded-circle'>
         </div>
         <div class='col bg-dark rounded mr-3'>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $fullname . "</span>
               </div>
               <div class='col'>
                  <span class='small'>". $email ."</span>
               </div>
            </div>
            <div class='row'>
               <div class='col'>
                  <span class='small'>" . $position . "</span> 
               </div>
               <div class='col'>
                  <span class='small'>" . $telephone . "</span>
               </div>
            </div>
         </div>
      </div>
   </li>
   ";
}
function getClientByCVR($cvr) {
   global $conn;
   $sql = 'SELECT * FROM clients where cvr = "'. $cvr .'"';
   $result = mysqli_query($conn, $sql);
   $client = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $client[] = $row;
       }
   }
   return $client;
}
function getClient($client_id) {
   global $conn;
   $sql = 'SELECT * FROM clients where client_id = "'. $client_id .'"';
   $result = mysqli_query($conn, $sql);
   $client = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $client[] = $row;
       }
   }
   return $client;
}
function getClientDetails($client_id) {
   global $conn;
   $sql = 'SELECT * FROM client_details where client_id = "'. $client_id .'"';
   $result = mysqli_query($conn, $sql);
   $details = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $details[] = $row;
       }
   }
   return $details;
}
function getClientUser($client_id) {
   global $conn;
   $sql = 'SELECT * FROM client_users where client = "'. $client_id .'"';
   $result = mysqli_query($conn, $sql);
   $clientUser = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $clientUser[] = $row;
       }
   }
   return $clientUser;
}
function getAssocClient($client_id, $relation) {
   global $conn;
   $sql = 'SELECT * FROM associated_client WHERE client_id = "'. $client_id .'" AND relation_id = "'. $relation .'"';
   $result = mysqli_query($conn, $sql);
   $assocClient = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $assocClient[] = $row;
       }
   }
   return $assocClient;

}
/*function getRelationsList($relation_name) {
   global $conn;
   $sql = 'SELECT * FROM client_relation where relation = "'$relation_name'"';
   $result = mysqli_query($conn, $sql);
   $relation = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $relation[] = $row;
       }
   }
   return $relation;
}*/
function debug($var) {
   echo '<pre>';
   print_r($var);
   echo '</pre>';
 }
 function getUser($user_id) {
   global $conn;
   $sql = 'SELECT * FROM users where user_id = "'. $user_id .'"';
   $result = mysqli_query($conn, $sql);
   $user = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $user[] = $row;
       }
   }
   return $user;
}
function getOwners($client_id) {
   global $conn;
   $sql = 'SELECT * FROM owners where client_id = "' . $client_id . '"';
   $result = mysqli_query($conn, $sql);
   $owners = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $owners[] = $row;
       }
   }
   return $owners;
}
function getPosition($position_id) {
   global $conn;
   $sql = 'SELECT * FROM position WHERE position_id = "'. $position_id .'"';
   $result = mysqli_query($conn, $sql);
   $position = [];
   if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_assoc($result)) {
           $position[] = $row;
       }
   }
   return $position;

}