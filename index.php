<?php include('templates/header.php');?>
<style>
    .custom-container{
        background-color: #ffc107;
    }
    .custom-wrapper{
        background-color: #ffc107;
    }
    .custom-row{
        border: 1px solid black;
        height: 100px;
    }
    .custom-col {
        border: 1px solid red;
    }
    .bg-custom{
        background-color: #ffc107;
    }
</style>
<div class="container custom-container">
    <div class="row offset custom-row" style="margin-top:10px;">
        <div class="col-md-4 custom-col">
            Column 1
        </div>
        <div class="col-md-4 custom-col">
            Column 2
        </div>
        <div class="col-md-4 custom-col">
            Column 3
        </div>
    </div>
</div>
    


<?php include('templates/footer.php');?>











