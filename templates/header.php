<?php 
$fanTitle;
$user = null;
include("functions.php");
$inclDB = false;

if($inclDB == true) {
    
    define('DBHOST', 'localhost');  
    define('DBPASS', 'root');        
    define('DBUSER', 'root');
    define('DBNAME', 'filmstart');    

    connect();
}
//html_entity_decode();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fanTitle;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="font-family:arial; background-color:#ffc107;">
<nav class="navbar navbar-expand-sm navbar-dark border-bottom" style="background-color:#000000;">
    <a class="navbar-brand" href="index.php">Aros & Søn ApS</a>
    <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse float-right" id="collapsibleNavbar">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="crm.php" >Relationship Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Økonomistyring</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Kommunikation</a>
            </li>
        </ul>
    </div>
</nav>