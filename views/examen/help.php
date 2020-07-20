<?php
use yii\helpers\Html;
?>

<h1>Info</h1>
<hr>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Student</h5>
    <h6 class="card-subtitle mb-2 text-muted">User</h6>
    <p class="card-text">Alle studenten loggen aan met één userID/password.</p>
    <p class="card-text">
        De student die is aangelogt kan ene gepsrek aanvragen. Bij de aanvraag
        moet hij zijn naam en lokaal op te geven. De student kan kiezen uit alle beschikbare gesprekken voor het 
        <i>actieve</i> examen. Er vind geen controle plaats of een gepsrek al een keer eerder is afgerond.
    </p>
    <?php echo Html::a('Gespreksaanvraag', ['gesprek/create']); ?>
  </div>
</div>

<br>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Examen</h5>
    <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
    <p class="card-text">In het examen overzicht kan één examen actief worden gemaakt.
        Alle gesrekken die deel uitmaken van het actieve examen kunnen worden aangevraagd door een student.
    </p>
    <p class="card-text">
        Klik op het examen in het examen overzicht om gesprekken actief te maken voor dit examen.
        Examens zijn een manier om een gespreksaanvragen te groeperen. Examens kunnen worden verwijderd. De gesprekken
        blijven onder het ID van het examen gewoon bestaan. In het gepsreksoverzicht kunnen deze worden getoond.
    </p>
    <?php echo Html::a('Examen Overzicht', ['examen/index']); ?>
  </div>
</div>


<br>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Gesprekstypen of gesprekssoort</h5>
    <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
    <p class="card-text">Hier worden alle gesprekken die onder een examen kunnen worden gehangen gedefineerd.
    </p>
    <?php echo Html::a('Gesprekstypen', ['gesprek/index']); ?>
  </div>
</div>

<br>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Rolspelers</h5>
    <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
    <p class="card-text">Hier worden alle rolspelers aagemaakt. Alleen rolspelers die actief staan kunnen worden
      toegewezen aan een gespreksaanvraag.
    </p>
    <?php echo Html::a('Rolspelers', ['rolspeler/index']); ?>
  </div>
</div>

<br>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Gespreksplanner</h5>
    <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
    <p class="card-text">Hier worden alle gesprekken getoond. De gebruiker kan kiezen
      om gesprekken van alle examens of alleen het actieve examen te zien.
      Ook kan de gebruiker op examen ID, status studentnaam, en lokaal filteren.
      Gesprekken kunnen worden gewijzig of verwijderd.
    </p>
    <?php echo Html::a('Gesprekken', ['gesprek/index']); ?>
  </div>
</div>

<br>

<div class="card" style="width: 60rem;">
  <div class="card-body">
    <h5 class="card-title">Gespreksplanner</h5>
    <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
    <p class="card-text">Hier worden alle gespreksaanvragen van het huidige actieve examen getoond.
      De planner kan een rolspeler toewijzen en de status veranderen. Bij toekennen van rolspelers en veranderen van status
      worden geen checks door het systeem uitgevoerd. Een rolspeler kan dus bijvoorbeeld meerdere gesprekken gelijktijding hebben.
    </p>
    <?php echo Html::a('Planner', ['gesprek/overzicht']); ?>
  </div>
</div>