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
            Selecteer:&nbsp;
            <a class="btn btn-success" role="button" href="select?all=1" title="Maak alle rolspelers actief">Allen</a>
            &nbsp;
            <a class="btn btn-primary" role="button" href="select?all=0" title="Maak alle rolspelers inactief">Geen</a>
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
                  return Html::a($data->naam, ['/rolspeler/update?id='.$data->id],['title' => 'Edit',]);
                },  
            ],
            [
                'attribute'=>'actief',
                'contentOptions' => ['style' => 'width:40px; white-space: normal;'],
                'format' => 'raw',
                'filter' => [''=> 'alles', '0'=>'Inactief','1'=>'Actief'],
                'value' => function ($data) {
                  $status = $data->actief ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-minus"></span>';
                  return Html::a($status, ['/rolspeler/toggle-actief?id='.$data->id], ['title' => 'Actief <-> Inactief',]);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:20px;'],
                'template' => '{delete}',
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