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
  <hr>

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      //'filterModel' => $searchModel,
      'columns' => [
          // ['class' => 'yii\grid\SerialColumn'],

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
            'contentOptions' => ['style' => 'width:20px; white-space: normal;'],
            'format' => 'raw',
            'value' => function ($data) {
              $status = $data->actief ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-minus"></span>';
              return Html::a($status, '/examen/toggle-actief?id='.$data->id);
            }
          ],
          [
            'attribute'=>'naam',
            'contentOptions' => ['style' => 'width:600px; white-space: normal;'],
            'format' => 'raw',
            'value' => function ($data) {
              return Html::a($data->naam, '/examen/update?id='.$data->id);
            },
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
  <?= Html::a('Nieuw Examen', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>
<hr>
Examenesprekken kunnen worden aangemaakt vanuit het <a href="/gesprek-soort/index">gesprekkenoverzicht</a>.
