<?php
$fanTitle = "CRM";
include('templates/header.php');
$rootFiles = "files/";
$currentComp;
$active;
$contractExpiration;
$deadline;
$financialYear;

//$primaryContacts = ["Lotte", "Andrea"];
$secondaryContacts = ["Bente", "Henrik", "Lise"];

$owners = ["Thomas"];

if(isset($_POST['cvr-input']) && !empty($_POST['cvr-input']) ){
    $pkCompany = getClientByCVR($_POST['cvr-input'])[0]['client_id'];
    $currentComp = getClientByCVR($_POST['cvr-input'])[0]['name'];
    $active = getClientDetails($pkCompany)[0]['active'];
    $contractExpiration = getClientDetails($pkCompany)[0]['contract_expiration'];
    $deadline = getClientDetails($pkCompany)[0]['deadline'];
    $financialYear = getClientDetails($pkCompany)[0]['financial_year'] ;
    $primaryContacts = getAssocClient($pkCompany, 1);
    $secondaryContacts = getAssocClient($pkCompany, 2);
    $owners = ["Thomas"];
}
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

<div class="searchbar-custom container-fluid"> <!-- Søgefelt -->
    <form method="post" class="row mt-3 mb-3 form-group">
        
            <div class="col-md-5 ">
                <!--
                <div class="form-group"> 
                    <label for="customer-input">Kunde</label>
                    <input class= "form-control" id="customer-input" type="text">
                </div>
                -->
                <div class=" my-auto">
                    <!--<label for="cvr-input">CVR</label>-->
                    <abbr title="Indtast CVR på kunden du vil slå op"><input class="form-control" id="cvr-input" name="cvr-input" type="text" placeholder="CVR"></abbr>
                </div>
            </div>
            <div class="col-md-2 my-md-auto mx-auto mt-1">
                <button class="btn btn-block" id="search" type="submit">Søg</button>
            </div>
            <div class="col-md-5 my-md-auto mt-1">
                <button class="btn btn-block">Opret ny kunde</button>
            </div>
        
    </form>
</div>


<?php if(isset($_POST['cvr-input']) && !empty($_POST['cvr-input']) ){ ?>
<div class="container-fluid">
    <div class="row"> 
        <div class="col-md-6" style="">
            <div class="row"> <!-- primære og sekundærer kontaktpersoner -->
                <div class="col" style="border-right:2px solid black;">
                    Primær kontaktperson:
                    <ul class="list-unstyled">
                    <?php
                        for($i = 0; $i < count($primaryContacts); $i++) { //for hver primary contact, gør følgende:
                            for($x = 0; $x < count(getClientUser($pkCompany)); $x++) { //for hver person ansat i kundens firma, tjek om det er primary contact
                                if(getClientUser($pkCompany)[$x]['client_user_id'] == $primaryContacts[$i]['client_user_id']){
                                    printClient($pkCompany, $x);
                                }
                            }
                        }
                    ?>
                        
                    </ul>
                    Sekundær(e) kontaktperson(er)
                    <ul class="list-unstyled">
                        <?php
                            for($i = 0; $i < count($secondaryContacts); $i++) { //for hver primary contact, gør følgende:
                                for($x = 0; $x < count(getClientUser($pkCompany)); $x++) { //for hver person ansat i kundens firma, tjek om det er primary contact
                                    if(getClientUser($pkCompany)[$x]['client_user_id'] == $secondaryContacts[$i]['client_user_id']){
                                        printClient($pkCompany, $x);
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row"> <!-- filsystem -->
                <div class="col border-right" style="border-right:2px solid black;">
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
            <div class="row"> <!-- kundeejere -->
                <div class="col" style="">
                    Ejer(e):
                    <br> 
                    <ul class="list-unstyled">
                        <?php
                            foreach($owners as $value) {
                                printEmployee($value);
                            }
                        ?>
                    </ul>
                    
                </div>
            </div>
            <div class="row"> <!-- Virksomhedsinformationer -->
                <div class="col" style="">
                    <h2>Virksomhedsinformationer</h2>
                    <ul class="list-unstyled">
                        <li>Aktiv kunde: <?php if ($active) {echo "Ja";}else{ echo "Nej";}?></li>
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



<?php }
include('templates/footer.php')
?>