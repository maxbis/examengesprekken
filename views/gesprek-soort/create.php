<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GesprekSoort */

$this->title = 'Aanmaken nieuw gesprekssoort';
$this->params['breadcrumbs'][] = ['label' => 'Gesprek Soorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gesprek-soort-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
