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
    <br>

    <div class="row">
      
      <div class="col-sm-4">
        <?= $form->field($model, 'student_naam')->textInput(['maxlength' => true])->label('Voor- en achternaam') ?>
      </div>

      <div class="col-sm-4">
        <?= $form->field($model, 'lokaal')->textInput(['maxlength' => true])->label('Lokaal (waar je nu zit)') ?>
        <?= $form->field($model, 'rolspeler_id')->hiddenInput(['value'=>'1'])->label(false); ?>
        <?= $form->field($model, 'status')->hiddenInput(['value'=>'0'])->label(false); ?>
      </div>

    </div>
    
    <div class="row">
      <div class="col-sm-8">
        <?= $form->field($model, 'gesprek_soort_id')->dropDownList($gesprekkenList)->label('Kies juiste gesprek') ?>
      </div>
    </div>

    <br><br>

    <div class="row">
      <div class="col-sm-8">

          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
          &nbsp;
          <?= Html::a('Cancel', ['/gesprek/overzicht'], ['class'=>'btn btn-primary']) ?>
 
      </div>

    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>


