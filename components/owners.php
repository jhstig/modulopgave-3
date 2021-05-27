Ejer(e):
<br>
<ul class="list-unstyled">
    <?php
        for($i = 0; $i < count($owners); $i++) { //for hver owner, gør følgende:
            printEmployee($owners[$i]['user_id']);
        }
    ?>
</ul>
