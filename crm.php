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
    .lvl1-custom{

    }
    .lvl2-custom{
        ml-1
       
    }
    .lvl3-custom{
        ml
    }
    .icon-custom{
        width: 15px;
        height: 15px;
    }
</style>

<div class="container">

</div>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div style="border:4px dotted black;">
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
</div>
<?php
include('templates/footer.php')
?>