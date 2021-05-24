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
    <div class="row">
        <div class="col-5  my-auto">
            <div class="form-group"> 
                <label for="customer-input">Kunde</label>
                <input class= "form-control" id="customer-input" type="text">
            </div>
            <div class="form-group">
                <label for="cvr-input">CVR</label>
            
                <input class="form-control" id="cvr-input" type="text">
            </div>
        </div>
        <div class="col-2 my-auto mx-auto">
            <button class="btn btn-block">Søg</button>
        </div>
        <div class="col-5 my-auto">
            <button class="btn btn-block ">Opret ny kunde</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    Primær kontaktperson:
                    <br>
                    Navn 1
                    <br>
                    Sekundær kontaktperson 
                    <br>
                    Navn 2
                    <br>
                    Navn 3
                </div>
            </div>
            <div class="row">
                <div class="col" style="border:4px dotted black;">
                    <?php
                    //print_r(dirToArray('files'));
                    //echo count(dirToArray('files'));
                    foreach (dirToArray($rootFiles) as $key => $value) {
                        //echo $key;
                        
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
                                            <div class="col folder-custom lvl3-custom">
                                                <img src='img/system/folder.png' class="icon-custom ml-5"><?php echo $key; ?>
                                            </div>
                                            
                                        <?php
                                        }
                                    }
                                }
                            }
                        }
                    }?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    Ejer:
                    <br> 
                    Navn 4
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Virksomhedsinformationer
                    <br>
                    Aktiv kunde: ja/nej 
                    <br>
                    Kontaktudløb: 
                    <br>
                    Deadline: N/A/31-02-22 
                    <br>
                    Regnskabsår:01-01-31-12 
                    <br>
                    Omsætning af de seneste 5 år 
            
                    <div class="container">
                        <table class="table">

                            <thead>
                                <tr>    
                                    <th>2016</th>
                                    <th>2017</th>
                                    <th>2018</th>
                                    <th>2019</th>
                                    <th>2020</th>
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