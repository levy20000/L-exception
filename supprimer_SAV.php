<?php  

include "SAV.php";
        $s=new SAV();
	$msg=$s->supprimer($_POST["IDSUP"]);


if($msg='ok')
{
    ?>
    <script type=""> location.replace("supprimer_sav.html");</script>
    <?php
}
else
{
    echo 'une erreur est survenue ';
}
?>