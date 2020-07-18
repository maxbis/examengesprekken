<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GesprekSoortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gesprek Soorts';
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
              'contentOptions' => ['style' => 'width:100px; white-space: normal;'],
            ],
        ],
    ]); ?>
</div>

<br>
<p>
  <?= Html::a('Create Gesprek Soort', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>
<hr>
<p>Gesprekken worden gekoppeld aan examens door in het <a href="/examen/index/">examenoverzicht</a> op de
examennaam te klikken.</p>
<p>Gesprekken kunnen worden gekopiierd vanuit het edit view-scherm; klik op het oogje bij het gesprek dat je wilt
kopieëren.</p>