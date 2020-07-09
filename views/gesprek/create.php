<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gesprek */

$this->title = 'Create Gesprek';
$this->params['breadcrumbs'][] = ['label' => 'Gespreks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gesprek-create">

    <h1><?= Html::encode($this->title)." voor ".$examen['naam'];?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'rolspelerList' => $rolspelerList,
        'examen' => $examen,
        'gesprekkenList' => $gesprekkenList,
    ]) ?>

</div>
