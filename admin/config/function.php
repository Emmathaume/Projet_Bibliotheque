<?php 

    function alert ($couleur,$message) {?>
        <div class="alert alert-<?= $couleur;?>" role="alert">
            <?= $message;?>
        </div>
    <?php };