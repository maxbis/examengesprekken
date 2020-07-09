<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GesprekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gespreks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gesprek-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gesprek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [ 'attribute' => 'statusNaam',
              'value' => 'statusNaam.naam'
            ],
            'student_naam',
            'lokaal',
            'rolspeler.naam',
            'gespreksNaam.gesprek_naam',
            //'status',
            ['class' => 'yii\grid\ActionColumn'],
            //[
            //  'class' => 'yii\grid\CheckboxColumn', // <-- here
            //    // you may configure additional properties here
            //],


        ]
    ]); ?>

</div>
