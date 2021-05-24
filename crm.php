<?php
include('templates/header.php');
$rootFiles = "files/";
$currentComp = 'virksomhed1';
$active = 1;
$contractExpiration = "31-02-22";
$deadline = "31-01-22";
$financialYear = "01-01 til 31-12";

$primaryContacts = ["Lotte"];
$secondaryContacts = ["Bente", "Henrik"];
$owners = ["Thomas"];



?>
<style>
    .folder-custom{
        border:1px dotted deeppink;
    }
    .file-custom{
        border:1px dotted green;
    }
    .icon-custom{
        width: 15px;
        height: 15px;
    }
    .test{
        border: 1px solid black;
    } 
    .searchbar-custom{
        border:1px solid black;
        
    }
    .contacts-custom{
        border:1px solid black;
    }
    
</style>

<div class="searchbar-custom container-fluid">
    <div class="row mt-2 mb-2">
        <div class="col-md-5 ">
            <!--
            <div class="form-group"> 
                <label for="customer-input">Kunde</label>
                <input class= "form-control" id="customer-input" type="text">
            </div>
            -->
            <div class="form-group my-auto">
                <!--<label for="cvr-input">CVR</label>-->
                <abbr title="Indtast CVR på kunden du vil slå op"><input class="form-control" id="cvr-input" type="text" placeholder="CVR:"></abbr>
            </div>
        </div>
        <div class="col-md-2 my-md-auto mx-auto mt-1">
            <button class="btn btn-block">Søg</button>
        </div>
        <div class="col-md-5 my-md-auto mt-1">
            <button class="btn btn-block ">Opret ny kunde</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col" style="">
            <div class="row">
                <div class="col-md-12" style="border:2px solid black;">
                    Primær kontaktperson:
                    <ul class="list-unstyled">
                        <?php
                            foreach($primaryContacts as $value) {
                                printClient($value);
                            }
                        ?>
                        
                    </ul>
                    
                    Sekundær(e) kontaktperson(er)
                    <ul class="list-unstyled">
                        <?php
                        foreach($secondaryContacts as $value){
                            printClient($value);
                        }?>
                    </ul >
                </div>
            </div>
            <div class="row">
                <div class="col" style="border:2px solid black;">
                    <span class="h4">Filer</span>
                    <?php
                    foreach (dirToArray($rootFiles) as $key => $value) {
                        //if ($key == //client_id[searched ID]) {                        
                            if(!is_dir("files/" . $key)) { ?>
                                <div class="col file-custom lvl1-custom">
                                    <img src='img/system/file.png' class="icon-custom"><?php echo $value; ?>
                                </div> <?php
                                
                            } else{ ?>
                                <div class="col folder-custom lvl1-custom">
                                    <img src='img/system/folder.png' class="icon-custom"><?php echo $key; ?>
                                </div> 
                                <?php $lvl2Files = $rootFiles . $key . "/";
                                foreach (dirToArray($lvl2Files) as $key => $value) {
                                    if(!is_dir($lvl2Files . $key)) { ?>
                                        <div class="col file-custom lvl2-custom">
                                            <img src='img/system/file.png' class="icon-custom ml-4"><?php echo $value;?>
                                        </div>
                                        
                                    <?php } else {?>
                                        <div class="col folder-custom lvl2-custom">
                                            <img src='img/system/folder.png' class="icon-custom ml-4"><?php echo $key; ?>
                                        </div> <?php
                                        $lvl3Files = $lvl2Files . $key . "/";
                                        foreach (dirToArray($lvl3Files) as $key => $value) {
                                            if(!is_dir($lvl3Files . $key)) { ?>
                                                <div class="col file-custom lvl3-custom">
                                                    <img src='img/system/file.png' class="icon-custom ml-5"><?php echo $value;?> 
                                                </div>
                                                
                                            <?php } else{ ?>
                                                <!--
                                                <div class="col folder-custom lvl3-custom">
                                                    <img src='img/system/folder.png' class="icon-custom ml-5"><?php echo $key; ?>
                                                </div>
                                                -->
                                                
                                            <?php
                                            }
                                        }
                                    }
                                }
                            }
                        //}
                    }?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col" style="border:2px solid black;">
                    Ejer(e):
                    <br> 
                    <ul class="list-unstyled">
                        <?php
                            foreach($owners as $value) {
                                printClient($value);
                            }
                        ?>
                    </ul>
                    
                </div>
            </div>
            <div class="row">
                <div class="col" style="border:2px solid black;">
                    <h2>Virksomhedsinformationer</h2>
                    <ul class="list-unstyled">
                        <li>Aktiv kunde: <?php if ($active){echo "Ja";}else{ echo "Nej";}?></li>
                        <li>Kontraktudløb: <?php echo $contractExpiration;?></li>
                        <li>Deadline:
                            <?php if($deadline != null) {
                                echo $deadline;
                            } else {
                                echo "N/A";
                            } ?>
                        </li>
                        <li>
                            Regnskabsår:
                            <?php if($financialYear != null) {
                                echo $financialYear;
                            } else {
                                echo "N/A";
                            } ?>
                        </li>
                    </ul>
                     
                    
                    
            
                    <div class="container" style="border:2px solid black;">
                        Omsætning af de seneste 5 år
                        <table class="table">
                            <thead>
                                <tr>    
                                    <th><?php echo date("Y") - 5 ?></th>
                                    <th><?php echo date("Y") - 4 ?></th>
                                    <th><?php echo date("Y") - 3 ?></th>
                                    <th><?php echo date("Y") - 2 ?></th>
                                    <th><?php echo date("Y") - 1 ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3 mil</td>
                                    <td>1 mil</td>
                                    <td>4 mil</td>
                                    <td>5 mil</td>
                                    <td>4 mil</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('templates/footer.php')
?>