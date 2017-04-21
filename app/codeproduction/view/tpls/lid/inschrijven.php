<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
  <h1>Les inschrijven</h1>
  <form  method="post" >
    <table>
      <tr>
        <td>Les</td>
        <td>Datum</td>
        <td>Tijd</td>
        <td>Inschrijven</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($inschrijvingen as $inschrijving){?>
        <tr>
          <td><?php echo $inschrijving->getDescription();?></td>
          <td><?php echo $inschrijving->getDate();?></td>
          <td><?php echo $inschrijving->getTime();?></td>
          <td><a href="?control=lid&action=inschrijvenles&lid=<?php echo $inschrijving->getId(); ?>">Registreer</a></td>
        </tr>
        <?php
          echo $inschrijving->getId();
        ?>
      <?php }?>
    </tbody>
  </table>
</div>

<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
