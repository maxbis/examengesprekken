<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gesprek */

$this->title = 'Create Gesprek';
$this->params['breadcrumbs'][] = ['label' => 'Gespreks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gesprek-create">

    <h1>Gespreksaanvraag</h1>
    voor: <?=$examen['naam']?>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
        'rolspelerList' => $rolspelerList,
        'examen' => $examen,
        'gesprekkenList' => $gesprekkenList,
    ]) ?>

</div>
