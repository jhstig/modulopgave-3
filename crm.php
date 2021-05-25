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
//$secondaryContacts = ["Bente", "Henrik", "Lise"];

//$owners = ["Thomas"];

if(isset($_POST['cvr-input']) && !empty($_POST['cvr-input']) ){
    $pkCompany = getClientByCVR($_POST['cvr-input'])[0]['client_id'];
    $currentComp = getClientByCVR($_POST['cvr-input'])[0]['name'];
    $active = getClientDetails($pkCompany)[0]['active'];
    $contractExpiration = getClientDetails($pkCompany)[0]['contract_expiration'];
    $deadline = getClientDetails($pkCompany)[0]['deadline'];
    $financialYear = getClientDetails($pkCompany)[0]['financial_year'] ;
    $primaryContacts = getAssocClient($pkCompany, 1);
    $secondaryContacts = getAssocClient($pkCompany, 2);
    $owners = getOwners($pkCompany);
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
                <div class="my-auto">
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
                        <?php include("components/contacts.php"); ?>
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
                        <?php include("components/filsystem.php");?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row"> <!-- kundeejere -->
                    <div class="col" style="">
                        <?php include("components/owners.php") ?>
                        Ejer(e):
                        <br> 
                        <ul class="list-unstyled">
                            <?php
                                for($i = 0; $i < count($owners); $i++) { //for hver owner, gør følgende:
                                    printEmployee($owners[$i]['user_id']);
                                }
                            ?>
                            
                            <?php/*
                                foreach($owners as $value) {
                                    printEmployee($value);
                                }
                            */?>
                        </ul>
                    </div>
                </div>
                <div class="row"> <!-- Virksomhedsinformationer -->
                    <div class="col" style="">
                        <?php include("components/companyinfo.php") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
include('templates/footer.php')
?>