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
      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model, 'naam')->textInput(['maxlength' => true]) ?>
        </div>
      </div>

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


    <?= $form->field($model, 'actief')->hiddenInput(['value'=> 0 ])->label(false); ?>

    <?php if (isset($gesprek)): ?>
      <h2>Gesprekken</h2>
      <p>
      <?php foreach ($gesprek as $item): ?>
        <?php $name = $item['kerntaak_nr'].".".$item['gesprek_nr']." : ".
                $item['kerntaak_naam']." ".$item['gesprek_naam']."<br>";

                if ( in_array($item['id'], $gesprekChecked) ) {
                  $status="checked";
                } else {
                  $status="unchecked";
                }
        ?>
        <input type="checkbox" id=<?= $item['id'] ?> name='checkbox[]' value=<?= $item['id'] ?> <?= $status ?> >
        <label for=<?= $item['id'] ?> > <?= $name ?> </label> <br>
      <?php endforeach ?>
    <?php endif ?>
    </p>

    <br>
    <div class="form-group">
      <?= Html::a('Cancel', ['/examen/index'], ['class'=>'btn btn-primary']) ?>
      &nbsp;&nbsp;&nbsp;
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  </div>
  <?php ActiveForm::end(); ?>

</div>

<br>
Examenesprekken kunnen worden aangemaakt vanuit het <a href="/gesprek-soort/index">gesprekkenoverzicht</a>.
