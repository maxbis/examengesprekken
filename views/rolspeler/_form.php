<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\rolspeler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rolspeler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actief')->checkbox() ?>


    <div class="form-group">
      <?= Html::a('Cancel', ['/rolspeler/index'], ['class'=>'btn btn-primary']) ?>
      &nbsp;&nbsp;&nbsp;
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
