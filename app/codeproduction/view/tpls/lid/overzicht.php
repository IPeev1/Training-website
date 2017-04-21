<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
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
        <?php foreach ($lessen as $les){?>
          <tr>
            <td><?php echo $les->getDate();?></td>
            <td><?php echo $les->getTime();?></td>
            <td><?php echo $les->getlocation();?></td>
            <td><?php echo $les->getDescription();?></td>
            <?php if($les->getMax_persons()>$les->getAantalaangemeld()&&$islesaangemeld->getLesson_id()!==$les->getId()){
              echo "<td><a href='?control=lid&action=deelnemen&id=$les->getId()'>deelnemen</a></td>";
            }?>

            <?php if($les->getMax_persons()<=$les->getAantalaangemeld()){
              echo "<td> VOL! </td>";
            }?>
          </tr>
        <?php }?>
      </tbody>
    </table>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
