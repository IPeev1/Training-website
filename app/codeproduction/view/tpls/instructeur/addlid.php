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
                <td>gebruikers naam</td>
                <td>
                    <input type="text" placeholder="username" name="usn"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>Wachtwoord</td>
                <td><input type="text" placeholder="password" name="ww"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>voornaam</td>
                <td>
                    <input type="text" placeholder="voornaam" name="voornaam"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>tussenvoegsel</td>
                <td><input type="text" placeholder="toessenvoegsel" name="tussenvoegsel">
                </td>
            </tr>
            <tr>
                <td>achternaam</td>
                <td>
                    <input type="text" placeholder="achternaam" name="achternaam"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>geboorte datum</td>
                <td>
                    <input type="text" placeholder="geboorte datum" name="geboortedatum"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>geslacht</td>
                <td>
                    <select name="formGender">
                        <option value="">Select...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>email</td>
                <td>
                    <input type="text" placeholder="e-mail" name="email"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>eerste werk dag</td>
                <td>
                    <input type="text" placeholder="eerste werkdag" name="fwd"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>salaris</td>
                <td>
                    <input type="text" placeholder="salaris" name="salaris"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>straat</td>
                <td>
                    <input type="text" placeholder="straatnaam" name="straat"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>postcode</td>
                <td>
                    <input type="text" placeholder="postcode" name="postcode"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>woonplaats</td>
                <td>
                    <input type="text" placeholder="woonplaats" name="stad"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>rol</td>
                <td>
                    <input type="hidden" value="lid">lid</input>
                </td>
            </tr>-
            <tr>
                <td><input type="submit" value="voeg toe" ></td>
                <td><input type="reset" value="reset"></td>
            </tr>
        </table>
    </form>
</div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
