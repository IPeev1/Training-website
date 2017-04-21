<?php
include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";?>

<div class="content">
  <form  method="post" >
    <table>
      <tr>
        <td>Datum</td>
        <td>
          <select name="date">
            <?php foreach ($dates as $date):?>
              <option value="<?= $date->getId();?>"><?= $date->getDate(); ?></option>
            <?php endforeach;?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Tijd</td>
        <td>
          <select name="time">
            <?php foreach ($times as $time):?>
              <option value="<?= $time->getId();?>"><?= $time->getTime(); ?></option>
            <?php endforeach;?>
          </select>
        </td>
      </tr>
      <tr>
      <td>Training</td>
        <td>
          <select name="tipe">
            <?php foreach ($lesnamen as $lesnaam):?>
              <option value="<?= $lesnaam->getId();?>"><?= $lesnaam->getDescription(); ?></option>
            <?php endforeach;?>
          </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" value="toevoegen" ></td>
        <td><input type="reset" value="reset"></td>
      </tr>
    </table>
  </form>
</div>

<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
