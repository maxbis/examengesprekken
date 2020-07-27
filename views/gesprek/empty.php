<?php

use yii\helpers\Html;

?>

<div class="Login Succes">

    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h1>Inloggen gelukt</h1>
            Actief examen: <?= $examen->naam ?> ( id: <?= $examen->id ?> )
        </div>
    </div>
</div>

<hr>

<br><br>
<?= Html::a('Nieuwe Gespreksaanvraag', ['/gesprek/create'], ['class' => 'btn btn-success']) ?>
