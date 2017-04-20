<?php
/**
 * Created by PhpStorm.
 * User: Sasagar BV
 * Date: 5-4-2017
 * Time: 20:26
 */
include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
    <div class="content">
        <form  method="post" >
            <table>
                <tr>
                    <td>Datum</td>
                    <td>
                        <input type="text" placeholder="datum" name="datum"
                               required="required" >
                    </td>
                </tr>
                <tr>
                    <td>tijds duur</td>
                    <td><input type="text" placeholder="time" name="time"
                               required="required" >
                    </td>
                </tr>
                <tr>
                    <td>location</td>
                    <td>
                        <input type="text" placeholder="datum" name="location"
                                required="required">
                    </td>
                </tr>
                <tr>
                    <td>training</td>
                    <td>
                        <select name="tipe">

                            <?php foreach ($lesnamen as $lesnaam):?>
                                <option value="<?= $lesnaam->getId();?>"><?= $lesnaam->getDescription(); ?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>max aantal deelnemers</td>
                    <td><input type="text" placeholder="maximum" name="maximum"
                               required="required" >
                    </td>
                </tr>
                <tr>
                    <td>instructeur</td>
                    <td>
                        <select name="instructeur">
                            <?php foreach ($instructeurs as $instructeur):?>
                                <option value="<?= $instructeur->getId();?>"><?= $instructeur->getFirstname(); ?> <?= $instructeur->getPreprovision(); ?> <?= $instructeur->getLastname(); ?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="toevoeggen" ></td>
                    <td><input type="reset" value="reset"></td>
                </tr>
            </table>
        </form>
    </div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>