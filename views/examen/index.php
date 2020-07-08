<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'naam',
              'contentOptions' => ['style' => 'width:600px; white-space: normal;'],
            ],
            [
              'attribute'=>'datum_van',
              'contentOptions' => ['style' => 'width:40px; white-space: normal;'],
            ],
            [
              'attribute'=>'datum_tot',
              'contentOptions' => ['style' => 'width:40px; white-space: normal;'],
            ],
            [
              'attribute'=>'actief',
              'contentOptions' => ['style' => 'width:10px; white-space: normal;'],
            ],
            // 'id',
            // 'naam',
            // 'datum_van',
            // 'datum_tot',
            // 'actief',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
