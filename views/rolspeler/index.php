<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolspelerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Rolspelers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rolspeler-index">

    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h1>Rolspelers</h1>
        </div>
        <div class="mt-auto p-2">
            Selecteer:
            <a class="btn btn-success" role="button" href="select?all=1">Allen</a>
            &nbsp;
            <a class="btn btn-primary" role="button" href="select?all=0">Geen</a>
            &nbsp;
        </div>
    </div>

    <hr>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'naam',
                'contentOptions' => ['style' => 'width:400px; white-space: normal;'],
                'format' => 'raw',
                'value' => function ($data) {
                  return Html::a($data->naam, '/rolspeler/update?id='.$data->id);
                },  
            ],
            [
                'attribute'=>'actief',
                'contentOptions' => ['style' => 'width:10px; white-space: normal;'],
                'format' => 'raw',
                'value' => function ($data) {
                  $status = $data->actief ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-minus"></span>';
                  return Html::a($status, '/rolspeler/toggle-actief?id='.$data->id);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:10px;'],
                'template' => '{delete} {update}',
            ],
        ],
    ]); ?>


</div>
<br>
<p>
    <?= Html::a('Nieuwe Rolspeler', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>
<hr>
<p>Rolspelers die actief zijn kunnen worden toegekend aan een gespreksaanvraag.</p>