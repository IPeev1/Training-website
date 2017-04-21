<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
  <h1>Instructeur beheer</h1>
  <table class="tableChange">
      <thead>
        <tr>
          <th>Voor n.</th>
          <th></th>
          <th>Achter n.</th>
          <th>Geboorte datum</th>
          <th>Geslacht</th>
          <th>Email</th>
          <th>1ste werkdag</th>
          <th>salaris</th>
          <th>Straat</th>
          <th>Postcode</th>
          <th>Plaats</th>
          <th>Functie</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody class="underline-gone">
        <?php foreach ($gebruikers as $gebruiker):?>
          <tr>
              <td><?= $gebruiker->getFirstname();?></td>
              <td><?= $gebruiker->getPreprovision();?></td>
              <td><?= $gebruiker->getLastname();?></td>
              <td><?= $gebruiker->getDateofbirth();?></td>
              <td><?= $gebruiker->getGender();?></td>
              <td><?= $gebruiker->getEmailaddress();?></td>
              <td><?= $gebruiker->getHire_date();?></td>
              <td><?= $gebruiker->getSalary();?></td>
              <td><?= $gebruiker->getStreet();?></td>
              <td><?= $gebruiker->getPostal_code();?></td>
              <td><?= $gebruiker->getPlace();?></td>
              <td><?= $gebruiker->getRole();?></td>

              <td><a href='?control=instructeur&action=updategebruiker&id=<?= $gebruiker->getId();?>'> bewerk</a></td>
              <td><a href='?control=instructeur&action=deletegebruiker&id=<?= $gebruiker->getId();?>'>/ X</a></td>
          </tr>
        <?php endforeach;?>
      <td>
        <tr>
          <td>
            <a href="?control=instructeur&action=addgebruiker">nieuwe gebruiker</a>
          </td>
        </tr>
      </tbody>
  </table>
</div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
