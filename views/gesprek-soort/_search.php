<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GesprekSoortSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gesprek-soort-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kerntaak_nr') ?>

    <?= $form->field($model, 'kerntaak_naam') ?>

    <?= $form->field($model, 'gesprek_nr') ?>

    <?= $form->field($model, 'gesprek_naam') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
