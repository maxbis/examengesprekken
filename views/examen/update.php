<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Examen */

$this->title = 'Update Examen: ' . $model->naam;
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gesprek' => $gesprek,
        'gesprekChecked' => $gesprekChecked,
    ]) ?>

</div>
