<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GesprekSoort */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gesprek Soorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gesprek-soort-view">

    <h1>Confirm delete</h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kerntaak_nr',
            'kerntaak_naam:ntext',
            'gesprek_nr',
            'gesprek_naam:ntext',
        ],
    ]) ?>
    <br>
    <div class="alert alert-danger">
        <h5>Let op! Het verwijderen van dit gesprektype zal <?= $count ?> gesprekken die zijn gekoppeld aan dit gesprekstpye ook verwijderen.</h5> 

        <br>

        <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-primary']) ?>

        <?= Html::a('Ja verwijderen', ['delete', 'id' => $model->id, 'confirm' => 1], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>

    </div>

</div>
