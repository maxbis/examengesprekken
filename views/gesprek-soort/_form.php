<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GesprekSoort */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="gesprek-soort-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-sm-2">
        <?= $form->field($model, 'kerntaak_nr')->textInput(['type' => 'number', 'style'=>'width:100px']) ?>
      </div>
      <div class="col-sm-8">
        <?= $form->field($model, 'kerntaak_naam')->textInput() ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        <?= $form->field($model, 'gesprek_nr')->textInput(['type' => 'number', 'style'=>'width:100px']) ?>
      </div>
      <div class="col-sm-8">
        <?= $form->field($model, 'gesprek_naam')->textInput() ?>
      </div>
    </div>

    <br>
    <p>

    <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-primary']) ?>
    &nbsp;
    <?= Html::submitButton('&nbsp;Save&nbsp;', ['class' => 'btn btn-success']) ?>



    <!--
    <?= Html::a('Delete', ['delete', 'id' => $model->id],
                          ['class' => 'btn btn-danger',
                            'data' => ['confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post']
                          ]
                ) ?>
    -->

    <!--
      <?= Html::a('Copy', ['copy', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    -->
    </p>

    <?php ActiveForm::end(); ?>

    

</div>
