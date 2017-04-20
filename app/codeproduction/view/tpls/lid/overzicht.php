<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
  <?php
    echo "<pre>".var_export($overzichten, true)."</pre>";
  ?>
  <table>
    <thead>
      <tr>
        <td>Datum</td>
        <td>Tijd</td>
        <td>Sport</td>
        <td>Aantal ingeschreven</td>
        <td>Verwijderen</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($overzichten as $overzicht):?>
        <tr>
          <td><?= $overzicht->getDate();?></td>
          <td><?= $overzicht->getTime();?></td>
          <td><?= $overzicht->getDescription();?></td>
          <td><?= $overzicht->getAanmeldingen();?></td>
          <td><a href='?control=lid&action=deleteles&id=<?= $overzicht->getId();?>'>Verwijder</a></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
