<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GesprekSoortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gesprekssoort';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gesprek-soort-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'kerntaak_nr',
              'contentOptions' => ['style' => 'width:10px; white-space: normal;'],
            ],
            [
              'attribute'=>'kerntaak_naam',
              'contentOptions' => ['style' => 'width:600px; white-space: normal;'],
              'format' => 'raw',
              'value' => function ($data) {
                return Html::a($data->kerntaak_naam, ['update?id='.$data->id],['title' => 'Edit',]);
              },
            ],
            [
              'attribute'=>'gesprek_nr',
              'contentOptions' => ['style' => 'width:20px; white-space: normal;'],
            ],
            [
              'attribute'=>'gesprek_naam',
              'contentOptions' => ['style' => 'width:300px; white-space: normal;'],
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width:80px; white-space: normal;'],
              'template' => '{copy} - {delete}',
              'buttons' => [
                'delete' => function($url, $model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                        'class' => '',
                        'title' => 'Delete',
                        'data' => [
                            'confirm' => 'LET OP! Alle gesprekken (gesprekaanvragen) voor dit type gepsrek zullen ook worden verwijderd, Weet je het heel zeker?',
                            'method' => 'post',
                        ],
                    ]); // end return statement
                }, // end function
                'copy' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-copy">C</span>', ['copy', 'id'=>$model->id],['title'=>'Copy']);
                },
              ],
            ],
        ],
    ]); ?>
</div>

<br>
<p>
  <?= Html::a('Nieuw Gespreksoort', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>
<hr>
<p>Gesprekken worden gekoppeld aan examens door in het <?= Html::a('examenoverzicht', ['/examen/index']) ?> op de
examennaam te klikken.</p>
<p>Gesprekken kunnen worden gekopieerd. Klik op het copy-icoontje voor de delete.</p>
<p>Let op: bij het verwijderen van gesprekken worden alle <?= Html::a('gesprekken', ['/gesprek/overzicht']) ?>
 van dit gesprekstype ook verwijderd!</p>
