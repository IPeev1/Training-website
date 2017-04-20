<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Instructeurs</h1>
   <table class="instructeur-table">
     <thead>
       <tr>
         <td>Voornaam</td>
         <td>Tussenvoegsel</td>
         <td>Achternaam</td>
         <td>Geboortedatum</td>
         <td>Geslacht</td>
         <td>Email</td>
         <td>Datum aangenomen</td>
         <td>Straat</td>
         <td>Postcode</td>
         <td>Plaats</td>
       </tr>
     </thead>
     <tbody>
       <?php
        foreach($instructeurs as $instructeur) {
          echo "
            <tr>
              <td>".$instructeur->getFirstname()."</td>
              <td>".$instructeur->getPreprovision()."</td>
              <td>".$instructeur->getLastname()."</td>
              <td>".$instructeur->getDateofbirth()."</td>
              <td>".$instructeur->getGender()."</td>
              <td>".$instructeur->getEmailaddress()."</td>
              <td>".$instructeur->getHire_date()."</td>
              <td>".$instructeur->getStreet()."</td>
              <td>".$instructeur->getPostal_code()."</td>
              <td>".$instructeur->getPlace()."</td>
              <td><a href='?control=admin&action=editinst&id=".$instructeur->getId()."'>wijzigen</a></td>
              <td><a href='?control=admin&action=deleteinst&id=".$instructeur->getId()."'>verwijderen</a></td>
            </tr>
          ";
        }
       ?>
     </tbody>
   </table>
   <div>
     <a href="?control=admin&action=addinst">toevoegen</a>
   </div>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
