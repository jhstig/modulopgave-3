<?php
include('templates/header.php');
$rootFiles = "files/";
$currentComp = 'virksomhed1';
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
        <div class="col-sm-5 ">
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
        <div class="col-sm-2 my-sm-auto mx-auto mt-1">
            <button class="btn btn-block">Søg</button>
        </div>
        <div class="col-sm-5 my-sm-auto mt-1">
            <button class="btn btn-block ">Opret ny kunde</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col" style="">
            <div class="row">
                <div class="col" style="border:2px solid black;">
                    Primær kontaktperson:
                    <ul class="list-unstyled">
                        <li>Navn 1</li>
                    </ul>
                    
                    Sekundær(e) kontaktperson(er)
                    <ul class="list-unstyled">
                        <li>
                            <div class="row">
                                <div class="col-auto" style="border:1px solid deeppink;">
                                    <img src="img\users\modulopgave 3 portrætter 1.png" alt="" style="width:40px;height:40px;">
                                </div>
                                <div class="col" style="border:1px solid deeppink;">
                                    <div class="row">
                                        <div class="col">
                                            <span class="small">Navn <br> Kunde</span>
                                            <span class="x-small"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="small">Email</span> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="small">Tlf</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                        </li>
                        <li>Navn 3</li>
                    </ul >
                </div>
            </div>
            <div class="row">
                <div class="col" style="border:2px solid black;">
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
                        <li>Navn 4</li>
                    </ul>
                    
                </div>
            </div>
            <div class="row">
                <div class="col" style="border:2px solid black;">
                    <h2>Virksomhedsinformationer</h2>
                    <ul class="list-unstyled">
                        <li>Aktiv kunde: ja/nej</li>
                        <li>Kontaktudløb:</li>
                        <li>Deadline: N/A/31-02-22 </li>
                        <li>Regnskabsår:01-01-31-12 </li>
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