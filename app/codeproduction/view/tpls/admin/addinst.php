<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Instructeur toevoegen</h1>
   <div>
     <form method="POST" class="addinst-form">
       <table>
         <tr>
           <td><input type="text" name="vn" placeholder="Voornaam (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="tv" placeholder="Tussenvoegsel"/></td>
         </tr>
         <tr>
           <td><input type="text" name="an" placeholder="Achternaam (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="gbd" placeholder="Geboortedatum (Y/M/D) (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="em" placeholder="Email (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="ad" placeholder="Aannemingsdatum (Y/M/D) (verplicht)" required/></td>
         </tr>
         <tr>
           <td>
             <select name='gs' required>
               <option selected disabled>Geslacht (verplicht)</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
             </select>
           </td>
         </tr>
         <tr>
           <td><input type="text" name="sl" placeholder="Salaris (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="st" placeholder="Straat (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="pc" placeholder="Postcode (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="pl" placeholder="Plaats (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="gbr" placeholder="Gebruikersnaam (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="password" name="ww" placeholder="Wachtwoord (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="submit" value="Toevoegen"/></td>
         </tr>
       </table>
     </form>
   </div>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
