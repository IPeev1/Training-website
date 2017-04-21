<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
  <h1>Overzicht</h1>
  <table class="overzicht-table">
    <thead>
      <tr>
        <td>Sport</td>
        <td>Locatie</td>
        <td>Datum</td>
        <td>Tijd</td>
        <td>Instructeur</td>
        <td>Prijs</td>
        <td>Extra kosten</td>
        <td>Verwijderen</td>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($ingeschrevenLessen as $les) {
          echo "
            <tr>
              <td>".$les->getDescription()."</td>
              <td>".$les->getLocation()."</td>
              <td>".$les->getDate()."</td>
              <td>".$les->getTime()."</td>
              <td>".$les->getFirstname()." ".$les->getPreprovision()." ".$les->getLastname()."</td>
              <td>".$les->getPayment()."</td>
              <td>".$les->getExtra_costs()."</td>
              <td><a href='?control=lid&action=deleteles&lid=".$les->getId()."'>verwijderen</a></td>
            </tr>
          ";
        }
      ?>
    </tbody>
  </table>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
