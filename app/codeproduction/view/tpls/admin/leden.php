<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Leden</h1>
   <table class="leden-table">
     <thead>
       <tr>
         <td>Voornaam</td>
         <td>Tussenvoegsel</td>
         <td>Achternaam</td>
         <td>Geboortedatum</td>
         <td>Geslacht</td>
         <td>Email</td>
         <td>Straat</td>
         <td>Postcode</td>
         <td>Plaats</td>
       </tr>
     </thead>
     <tbody>
       <?php
        foreach($leden as $lid) {
          echo "
            <tr>
              <td>".$lid->getFirstname()."</td>
              <td>".$lid->getPreprovision()."</td>
              <td>".$lid->getLastname()."</td>
              <td>".$lid->getDateofbirth()."</td>
              <td>".$lid->getGender()."</td>
              <td>".$lid->getEmailaddress()."</td>
              <td>".$lid->getStreet()."</td>
              <td>".$lid->getPostal_code()."</td>
              <td>".$lid->getPlace()."</td>
              <td><a href='?control=admin&action=deletelid&id=".$lid->getId()."'>verwijderen</a></td>
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
