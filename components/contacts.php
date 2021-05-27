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
