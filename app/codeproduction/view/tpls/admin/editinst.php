<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Instructeur wijzigen</h1>
   <div>
     <form method="POST" class="editinst-form">
       <table>
         <tr>
           <td>Voornaam (verplicht): </td>
           <td><input type="text" name="vn" value="<?=!empty($instructeur->getFirstname()) ? $instructeur->getFirstname() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Tussenvoegsel</td>
           <td><input type="text" name="tv" value="<?= !empty($instructeur->getPreprovision()) ? $instructeur->getPreprovision() : ''?>"/></td>
         </tr>
         <tr>
           <td>Achternaam (verplicht): </td>
           <td><input type="text" name="an" value="<?=!empty($instructeur->getLastname()) ? $instructeur->getLastname() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Geboortedatum (Y/M/D) (verplicht): </td>
           <td><input type="text" name="gbd" value="<?=!empty($instructeur->getDateofbirth()) ? $instructeur->getDateofbirth() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Email (verplicht): </td>
           <td><input type="text" name="em" value="<?=!empty($instructeur->getEmailaddress()) ? $instructeur->getEmailaddress() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Aannemingsdatum (Y/M/D) (verplicht): </td>
           <td><input type="text" name="ad" value="<?=!empty($instructeur->getHire_date()) ? $instructeur->getHire_date() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Geslacht (verplicht): </td>
           <td>
             <select name="gs" required>
               <?php
                if ($instructeur->getGender() === 'male') {
                  echo "
                    <option value='male' selected>Male</option>
                    <option value='female'>Female</option>
                  ";
                } else {
                  echo "
                    <option value='male'>Male</option>
                    <option value='female' selected>Female</option>
                  ";
                }
               ?>

             </select>
           </td>
         </tr>
         <tr>
           <td>Salaris (verplicht): </td>
           <td><input type="text" name="sl" value="<?=!empty($instructeur->getSalary()) ? $instructeur->getSalary() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Straat (verplicht): </td>
           <td><input type="text" name="st" value="<?=!empty($instructeur->getStreet()) ? $instructeur->getStreet() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Postcode (verplicht): </td>
           <td><input type="text" name="pc" value="<?=!empty($instructeur->getPostal_code()) ? $instructeur->getPostal_code() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Plaats (verplicht): </td>
           <td><input type="text" name="pl" value="<?=!empty($instructeur->getPlace()) ? $instructeur->getPlace() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Gebruikersnaam (verplicht): </td>
           <td><input type="text" name="gbr" value="<?=!empty($instructeur->getLoginname()) ? $instructeur->getLoginname() : ''?>" required/></td>
         </tr>
         <tr>
           <td>Wachtwoord (verplicht): </td>
           <td><input type="password" name="ww" value="<?=!empty($instructeur->getPassword()) ? $instructeur->getPassword() : ''?>" required/></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" value="Wijzigen"/></td>
         </tr>
       </table>
     </form>
   </div>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
