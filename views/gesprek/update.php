<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gesprek */

$this->title = 'Update Gesprek: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gespreks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card">
  <div class="card-header">
    <h3><?= Html::encode($this->title) ?></h3>
    <h3>Examen: <?= $examen->naam ?></h3>
    <br>
  </div>
  <div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'gesprekkenList' => $gesprekkenList,
    ]) ?>
  </div>
</div>
