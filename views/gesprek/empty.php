<?php

use yii\helpers\Html;

use nex\datepicker\DatePicker;

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

<?= DatePicker::widget([
    'name' => 'datepickerTest',
    'value' => '09/13/2015',
    'clientOptions' => [
        'format' => 'L',
    ],
    'dropdownItems' => [
        ['label' => 'Yesterday', 'url' => '#', 'value' => \Yii::$app->formatter->asDate('-1 day')],
        ['label' => 'Tomorrow', 'url' => '#', 'value' => \Yii::$app->formatter->asDate('+1 day')],
        ['label' => 'Some value', 'url' => '#', 'value' => 'Special value'],
    ],
]);?>