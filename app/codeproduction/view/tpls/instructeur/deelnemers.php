<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
<div class="content">
    <table>
        <thead>
        <tr>
            <?php if( $allegebruikers) { echo "dit zijn alle leden van de training<br />".$allegebruikers[0]->trainingsnaam;} else { echo 'Geen leden zijn voor deze les ingeschreven';}?>
        </tr>
        <tr>
            <td>Voornaam</td>
            <td>Tussenvoegsel</td>
            <td>Achternaam</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allegebruikers as $gebruiker):?>
            <tr>
                <td><?= $gebruiker->getFirstname();?></td>
                <td><?= $gebruiker->getPreprovision();?></td>
                <td><?= $gebruiker->getLastname();?></td>
            </tr>
        <?php endforeach;?>
        </table>
    </table>
</div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
