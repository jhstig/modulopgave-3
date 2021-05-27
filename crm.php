<?php
$fanTitle = "CRM";
include('templates/header.php');
$rootFiles = "files/";
$currentComp;
$active;
$contractExpiration;
$deadline;
$financialYear;

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
    $name = getclient($pkCompany)[0]['name'];
}
?>
<style>
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


<?php if(isset($_POST['cvr-input']) && !empty($_POST['cvr-input'])){ ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="">
                <div class="row"> <!-- primære og sekundærer kontaktpersoner -->
                    <div class="col" style="border-right:2px solid black;">
                        <?php include("components/contacts.php"); ?>
                    </div>
                </div>
                <div class="row"> <!-- filsystem -->
                    <div class="col" style="border:2px solid black;">
                        <?php include("components/filsystem.php");?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row"> <!-- kundeejere -->
                    <div class="col" style="">
                        <?php include("components/owners.php") ?>
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
