<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div class="card">
  <div class="card-body">
    <h3 class="card-title">Gesprekken Overzicht</h5>

<table class="table" style="width: 100rem;" border=0>

  <tr>
      <th scope="col" style="width: 15rem;">Student</th>
      <th scope="col" style="width: 5rem;">Lokaal</th>
      <th scope="col" style="width: 20rem;">Gesprek</th>

      <th scope="col" style="width: 10rem;">Rolspeler</th>
      <th scope="col" style="width: 10rem;">Status</th>
      <th scope="col" style="text-align: right;width: 10rem;">&nbsp;</th>

  </tr>

    <?php foreach ($gesprekken as $item): ?>
      <tr>
        <?php $gesprek =  $item->gesprekSoort->kerntaak_nr.".".$item->gesprekSoort->gesprek_nr." ".$item->gesprekSoort->gesprek_naam;
        ?>
        <?php //dd($gesprek); ?>
        <td><?= $item->student_naam ?></td>
        <td><?= $item->lokaal ?></td>
        <td><?= $gesprek ?></td>
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
          </td><td>
            <select name="status" id="status">
              <option value=0 >Wachten</option>
              <option value=1 >Loopt</option>
              <option value=1 >Klaar</option>
              <?php
                $status=['wachten','Loopt','Klaar']; 
                for($i=0;$i<=2;$i++): 
                  if ($i == $item->status) {
                    $select = 'selected';
                  } else {
                    $select = '';
                  } ?>
                  <option value=<?= $i ?> <?= $select ?> > <?= $status[$i] ?> </option>
                <?php endfor ?>

            </select>
        </td><td>
          <input type="submit" value="Update">
        </td>
        </form>
      </tr>
    <?php endforeach; ?>

</table>

</div>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
