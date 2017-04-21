<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
    <table class="space3">
      <thead>
        <tr>
          <td>Datum</td>
          <td>Tijd</td>
          <td>Lokaal</td>
          <td>Sport</td>
          <td>Aantal ingeschreven</td>
          <td>Deelnemerslijst</td>
          <td>Bewerken</td>
          <td>Verwijderen</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lessen as $les):?>
          <tr>
            <td><?= $les->getDate();?></td>
            <td><?= $les->getTime();?></td>
            <td><?= $les->getlocation();?></td>
            <td><?= $les->getDescription();?></td>
            <td><?php if($les->getAanmeldingen()<2){
                    echo "-";}
                if($les->getAanmeldingen()>1){echo $les->getAanmeldingen();}?></td>
            <td><a href='?control=instructeur&action=deelnemers&id=<?= $les->getId();?>'>Lijst</a></td>
            <td><a href='?control=instructeur&action=updateles&id=<?= $les->getId();?>'>Bewerk</a></td>
            <td><a href='?control=instructeur&action=deleteles&id=<?= $les->getId();?>'>Verwijder</a></td>
          </tr>
        <?php endforeach;?>
          <tr>
              <td>
                  <a href="?control=instructeur&action=addles">nieuwe les</a>
              </td>
          </tr>
      </tbody>
    </table>
</div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
