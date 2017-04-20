<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Trainginsvormen toevoegen</h1>
   <div>
     <form method="POST" class="addtraining-form">
       <table>
         <tr>
           <td><input type="text" name="bs" placeholder="Beschrijving (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="dr" placeholder="Duur (verplicht)" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="ek" placeholder="Extra kosten (verplicht)" required/></td>
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
