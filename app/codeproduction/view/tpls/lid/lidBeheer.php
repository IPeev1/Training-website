<?php
/**
 * Created by PhpStorm.
 * User: Sasagar BV
 * Date: 5-4-2017
 * Time: 20:26
 */
include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php"; ?>
  <div class="content">
    <h1>Account beheer</h1>
    <form  method="post" >
      <table>
        <tr>
          <td>gebruikers naam</td>
          <td>
            <input type="text" placeholder="username" name="usn"
                   required="required" value="<?= !empty($gebruiker->getLoginname())?$gebruiker->getLoginname():'';?>">
          </td>
        </tr>
        <tr>
          <td>Wachtwoord</td>
          <td><input type="text" placeholder="password" name="ww"
                     required="required" value="<?= !empty($gebruiker->getPassword())?$gebruiker->getPassword():'';?>">
          </td>
        </tr>
        <tr>
          <td>voornaam</td>
          <td>
            <input type="text" placeholder="voornaam" name="voornaam"
                   required="required" value="<?= !empty($gebruiker->getFirstname())?$gebruiker->getFirstname():'';?>">
          </td>
        </tr>
        <tr>
          <td>tussenvoegsel</td>
          <td><input type="text" placeholder="toessenvoegsel" name="tussenvoegsel"
                     required="required" value="<?= !empty($gebruiker->getPreprovision())?$gebruiker->getPreprovision():'';?>">
          </td>
        </tr>
        <tr>
          <td>achternaam</td>
          <td>
            <input type="text" placeholder="achternaam" name="achternaam"
                   required="required" value="<?= !empty($gebruiker->getLastname())?$gebruiker->getLastname():'';?>">
          </td>
        </tr>
        <tr>
          <td>geboorte datum</td>
          <td>
            <input type="text" placeholder="geboorte datum" name="geboortedatum"
                   required="required" value="<?= !empty($gebruiker->getDateofbirth())?$gebruiker->getDateofbirth():'';?>">
          </td>
        </tr>
        <tr>
          <td>geslacht</td>
          <td>
            <select name="formGender">
              <option value="<?= !empty($gebruiker->getGender())?$gebruiker->getGender():'';?>"><?= $gebruiker->getGender()?></option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>email</td>
          <td>
            <input type="text" placeholder="e-mail" name="email"
                   required="required" value="<?= !empty($gebruiker->getEmailaddress())?$gebruiker->getEmailaddress():'';?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="hidden" placeholder="eerste werkdag" name="hire_date"
                   value="<?= !empty($gebruiker->getHire_date())?$gebruiker->getHire_date():'';?>">
          </td>
        </tr>
        <tr>
          <td>straat</td>
          <td>
            <input type="text" placeholder="straatnaam" name="straat"
                   required="required" value="<?= !empty($gebruiker->getStreet())?$gebruiker->getStreet():'';?>">
          </td>
        </tr>
        <tr>
          <td>postcode</td>
          <td>
            <input type="text" placeholder="postcode" name="postcode"
                   required="required" value="<?= !empty($gebruiker->getPostal_code())?$gebruiker->getPostal_code():'';?>">
          </td>
        </tr>
        <tr>
          <td>woonplaats</td>
          <td>
            <input type="text" placeholder="woonplaats" name="stad"
                   required="required" value="<?= !empty($gebruiker->getPlace())?$gebruiker->getPlace():'';?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="hidden" placeholder="id" name="id"
                   required="required" value="<?= !empty($gebruiker->getId())?$gebruiker->getId():'';?>">
          </td>
        </tr>

        <tr>
          <td><input type="submit" value="verander" ></td>
          <td><input type="reset" value="reset"></td>
        </tr>
      </table>
    </form>
  </div>
<?php include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php"; ?>
