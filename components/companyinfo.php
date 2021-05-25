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