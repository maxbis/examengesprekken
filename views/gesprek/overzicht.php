<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div class="gesprek-overzicht">
    <h1>Gespreksoverzicht</h1>
    voor examen:  <a href="/examen/update?id=<?=$examen->id?>">
                    <span class="bg-info text-white" ><?=$examen->naam?></span>
                  </a>(<?=$examen->datum_van?> - <?=$examen->datum_tot?>)

    <hr>

  <table class="table" style="width: 100rem;">

    <tr>
      <th scope="col" style="width: 5rem;">&nbsp;</th>
      <th scope="col" style="width: 15rem;">Student</th>
      <th scope="col" style="width: 5rem;">Lokaal</th>
      <th scope="col" style="width: 20rem;">Gesprek</th>
      <th scope="col" style="width: 10rem;">Rolspeler</th>
      <th scope="col" style="width: 10rem;">Status</th>
      <th scope="col" style="text-align: right;width: 10rem;">&nbsp;</th>
    </tr>

    <?php foreach ($gesprekken as $item): ?>
      <tr>
        <?php $gesprek = $item->gesprekSoort->kerntaak_nr.".".$item->gesprekSoort->gesprek_nr." ".$item->gesprekSoort->gesprek_naam;?>

        <?php if ($item->status == 1): // loopt ?>
          <?php $style="font-weight:bold; color:#349101;" ?>
        <?php elseif(($item->status == 2)): // klaar ?>
          <?php $style="color:#202020" ?>
        <?php elseif(($item->status == 0)): // wachten ?>
          <?php $style="color:#d90202; font-weight:bold;" ?>
        <?php endif;?>

        <td>
          <a href="update?id=<?=$item->id?>" ><span class="glyphicon glyphicon-edit"></span></a>
        </td>

        <td style="<?=$style?>"><?= $item->student_naam ?></td>
        <td style="<?=$style?>"><?= $item->lokaal ?></td>
        <td style="<?=$style?>"><?= $gesprek ?></td>
        
        <form action="/gesprek/update-regel">
          <input type="hidden" id="id" name="id" value=<?= $item->id  ?>>
          <td>

            <select name="rolspeler" id="rolspeler">
              <?php foreach($item->allRolspelers as $itemList):
                if ($itemList->id == $item->rolspeler_id) {
                  $select = 'selected';
                } else {
                  $select = '';
                } ?>
                <option value= <?= $itemList->id ?> <?= $select ?> ><?= $itemList->naam ?></option>
              <?php endforeach ?>
            </select>
          </td>
          <td>

            <select name="status" id="status">
              <?php
                $status=['Wachten','Loopt','Klaar'];
                for($i=0;$i<=2;$i++) {
                  if ($i == $item->status) {
                    $select = 'selected';
                  } else {
                    $select = '';
                  }
                ?>
                  <option value=<?= $i ?> <?= $select ?> > <?= $status[$i] ?> </option>
                <?php };
              ?>
            </select>
          </td>
          <td>
            <input type="submit" value="Update">
          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<hr>
<br>
<p>
  &nbsp;
  <?= Html::a('<span class="glyphicon glyphicon-list-alt"> Examens</span>', ['/examen/index'], ['class' => 'btn btn-info']) ?>
</p>
<br>
