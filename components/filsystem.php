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
