<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bevestiging">

  <h1>Gespreksaanvraag bevestiging</h1>
  Voor: <span class="bg-secondary text-white" > <?= $examen->naam ?> </span>
  <hr>

 <br>

<div class="card text-center">
  <div class="card-header">
    <h5><?=$gesprek->statusNaam->naam?></h5>
  </div>
  <div class="card-body">
    <h4 class="card-title"><?=$gesprek->student_naam?></h4>
    <p class="card-text">Lokaal <?=$gesprek->lokaal?></p>
    <h5 class="card-text">Aanvraag voor gesprek: <?=$gesprek->gesprekSoort->gesprek_naam?></h5>
    
  </div>
  <div class="card-footer text-muted">
  <a href="bevestiging?id=<?= $gesprek->id ?>" class="btn btn-primary">refresh status</a>
  </div>
</div>

<br>

