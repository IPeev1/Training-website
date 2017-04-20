<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Trainingsvorm wijzigen</h1>
   <div>
     <form method="POST" class="edittraining-form">
       <table>
         <tr>
           <td><input type="text" name="bs" placeholder="Beschrijving (verplicht)" value="<?= !empty($trainingsvorm->getDescription()) ? $trainingsvorm->getDescription() : '';?>" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="dr" placeholder="Duur (verplicht)" value="<?= !empty($trainingsvorm->getDuration()) ? $trainingsvorm->getDuration() : '';?>" required/></td>
         </tr>
         <tr>
           <td><input type="text" name="ek" placeholder="Extra kosten (verplicht)" value="<?= !empty($trainingsvorm->getExtra_costs()) ? $trainingsvorm->getExtra_costs() : '';?>" required/></td>
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
