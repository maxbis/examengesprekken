<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GesprekSoort */

$this->title = 'Update Gesprek Soort: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gesprek Soorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gesprek-soort-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
