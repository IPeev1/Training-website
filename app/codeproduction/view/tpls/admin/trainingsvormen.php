<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
   <h1>Trainingsvormen</h1>
   <table class="trainingsvormen-table">
     <thead>
       <tr>
         <td>Beschrijving</td>
         <td>Duur (min)</td>
         <td>Extra kosten</td>
       </tr>
     </thead>
     <tbody>
       <?php
        foreach($trainingsvormen as $trainingsvorm) {
          echo "
            <tr>
              <td>".$trainingsvorm->getDescription()."</td>
              <td>".$trainingsvorm->getDuration()."</td>
              <td>".$trainingsvorm->getExtra_costs()."</td>
              <td><a href='?control=admin&action=edittrain&id=".$trainingsvorm->getId()."'>wijzigen</a></td>
              <td><a href='?control=admin&action=deletetrain&id=".$trainingsvorm->getId()."'>verwijderen</a></td>
            </tr>
          ";
        }
       ?>
     </tbody>
   </table>
   <div>
     <a href="?control=admin&action=addtrain">toevoegen</a>
   </div>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
