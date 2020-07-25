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

    <div class="row">
      <div class="col-sm-2">
      <label class="control-label" >Rolspeler</label><br>
        <select name="gesprek[rolspeler_id]" id="rolspeler">
          <?php foreach($model->allRolspelers as $itemList):
            if ($itemList->id == $model->rolspeler_id) {
              $select = 'selected';
            } else {
              $select = '';
            } ?>
            <option value= <?= $itemList->id ?> <?= $select ?> ><?= $itemList->naam ?></option>
          <?php endforeach ?>
        </select>
      </div>
    
      <div class="col-sm-2">
      <label class="control-label" >Status</label><br>
        <select name="gesprek[status]" id="status">
          <?php
            $status=['Wachten','Loopt','Klaar'];
            for($i=0;$i<=2;$i++) {
              if ($i == $model->status) {
                $select = 'selected';
              } else {
                $select = '';
              }
            ?>
            <option value=<?= $i ?> <?= $select ?> > <?= $status[$i] ?> </option>
            <?php };
          ?>
        </select>
      </div>
    </div>

    <br><br>

    <div class="row">
      <div class="col-sm-8">

        <?= Html::a('Cancel', [basename($cancel)], ['class'=>'btn btn-primary']) ?>
        &nbsp;
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
 
      </div>

    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>


