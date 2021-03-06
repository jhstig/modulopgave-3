<h2>Virksomhedsinformationer</h2>
<ul class="list-unstyled">
    <li><span class="h4 text-underline">Kunde: <?php echo $name ?></span></li>
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
            <td><?php echo "N/A"; ?></td>
            <td><?php echo "N/A"; ?></td>
            <td><?php echo "N/A"; ?></td>
            <td><?php echo "N/A"; ?></td>
            <td><?php echo "N/A"; ?></td>
        </tr> 
    </tbody>
</table>