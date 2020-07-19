<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\app;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GesprekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gespreks';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="gesprek-index">

    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h1>Gesprekken</h1>
            <a href="index?GesprekSearch[examen_id]=<?=$examen->id?>">Actief examen: <?= $examen->naam ?> ( id: <?= $examen->id ?> )</a>
        </div>
        <div class="mt-auto p-2">
            Selecteer: <a class="btn btn-primary" role="button" href="index?GesprekSearch[examen_id]=<?=$examen->id?>">Actief Examen</a>
            &nbsp;
            <?= Html::a('Alle Examens', ['index'], ['class' => 'btn btn-info']) ?>
        &nbsp;
        </div>
    </div>

    <hr>

    <?php $identity = Yii::$app->user->identity->role; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute'=>'examen_id',
                'contentOptions' => ['style' => 'width:10px; white-space: normal;'],
                'value' => 'examen_id',
            ],
            [ 'attribute' => 'statusNaam',
              'value' => 'statusNaam.naam'
            ],
            'student_naam',
            'lokaal',
            'rolspeler.naam',
            'gespreksNaam.gesprek_naam',

            [   
                'class' => 'yii\grid\ActionColumn',
                'visible' => ($identity == 'admin'),
            ],

            //[
            //  'class' => 'yii\grid\CheckboxColumn', // <-- here
            //    // you may configure additional properties here
            //],


        ]
    ]); ?>
</div>
<br>

<p>
<?= Html::a('Create Gesprek', ['create'], ['class' => 'btn btn-success']) ?>
&nbsp;
<?= Html::a('<span class="glyphicon glyphicon-list-alt"> Examens</span>', ['/examen/index'], ['class' => 'btn btn-info']) ?>
</p>

<hr>
