<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use nex\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Examen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naam')->textInput(['maxlength' => true]) ?>

    <div class="row">
      <div class="col-sm-2">
        <?= $form->field($model, 'datum_van')->widget(
            DatePicker::className(), [
              'clientOptions' => [
                'format' => 'Y-MM-D',
                'stepping' => 30,
                'minDate' => '2020-01-01',
                'maxDate' => '2025-12-31',
              ],
            ]);
        ?>
      </div>

      <div class="col-sm-2">
        <?= $form->field($model, 'datum_tot')->widget(
            DatePicker::className(), [
              'clientOptions' => [
                'format' => 'Y-MM-D',
                'stepping' => 30,
                'minDate' => '2020-01-01',
                'maxDate' => '2025-12-31',
              ],
            ]);
        ?>
      </div>
    </div>

    <?= $form->field($model, 'actief')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
