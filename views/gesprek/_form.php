<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Rolspeler;

/* @var $this yii\web\View */
/* @var $model app\models\Gesprek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gesprek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokaal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rolspeler_id')->hiddenInput(['value'=>'1'])->label(false); ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>'0'])->label(false); ?>

    <?= $form->field($model, 'gesprek_soort_id')->dropDownList($gesprekkenList) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
