<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/header.php";
?>

<div class="content">
  <form id="registratie" method="POST">
    <h1 class="text-dis">Lid worden</h1>
    <h4 class="text-dis">
      Om gebruik te kunnen maken van de lessen moet je bij ons bekend zijn.<br>
      Vul hieronder alle gegevens in en registreer jezelf.
    </h4>
    <div class="text-dis">
      <?php
        echo $note;
      ?>
    </div>
    <div class="table1">
      <table>
        <tr>
          <td>
            <span>Voornaam *</span>
          </td>
          <td>
            <input class="size-lg" type="text" name="firstname" placeholder='voornaam' required="required" value="<?= !empty($form_data['firstname'])?$form_data['firstname']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Tussenvoegsel</span>
          </td>
          <td>
            <input class="size-lg" type="text" placeholder="tussenvoegsel" name="preprovision" value="<?= !empty($form_data['preprovision'])?$form_data['preprovision']:'';?>"/>
          </td>
        </tr>
        </tr>
          <tr>
            <td>
              <span>Achternaam *</span>
            </td>
            <td>
              <input class="size-lg" type="text" name="lastname" required="required" placeholder='achternaam' value="<?= !empty($form_data['lastname'])?$form_data['lastname']:'';?>"/>
            </td>
          </tr>
        <tr>
        <tr>
          <td>
            <span>Geboortedatum *</span>
          </td>
          <td>
            <input type="text" name="dateofbirth" placeholder="jaar/maand/dag" required="required" value="<?= !empty($form_data['dateofbirth'])?$form_data['dateofbirth']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Gebruikersnaam *</span>
          </td>
          <td>
            <input type="text" name="loginname" placeholder='loginnaam' required="required" value="<?= !empty($form_data['loginname'])?$form_data['loginname']:'';?>"/>
            <p class="gbrnm-r"> (Te gebruiken om in te inloggen)</p>
          </td>
        </tr>
        <tr>
          <td>
            <span>Wachtwoord *</span>
          </td>
          <td>
            <input type="text" name="password" placeholder='wachtwoord' required="required" value="<?= !empty($form_data['password'])?$form_data['password']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Herhaling wachtwoord *</span>
          </td>
          <td>
            <input type="text" name="password2" placeholder='wachtwoord' required="required"/>
          </td>
        </tr>
      </table>
    </div>
    <p class="text-dis">Het wachtwoord is nodig om in te loggen. Moet minimaal 6 tekens bevatten</p>
    <div class="table2">
      <table>
        <tr>
          <td>
            <span>Vrouw/Man:</span>
          </td>
          <td>
            <input type="text" name="gender" placeholder="gender" required="required" value="<?= !empty($form_data['gender'])?$form_data['gender']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Straat *</span>
          </td>
          <td>
            <input type="text" name="street" placeholder="straatnaam" required="required"  value="<?= !empty($form_data['street'])?$form_data['street']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Postcode *</span>
          </td>
          <td>
            <input type="text" name="postalcode" placeholder="postcode" required="required" value="<?= !empty($form_data['postalcode'])?$form_data['postalcode']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <span>Stad:</span>
          </td>
          <td>
            <input class="size-lg" type="text" name="place" placeholder="woonplaats"  value="<?= !empty($form_data['place'])?$form_data['place']:'';?>"/>
          </td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
            <input class="size-lg" type="email" name="email" placeholder="email" value="<?= !empty($form_data['email'])?$form_data['email']:'';?>"/>
          </td>
        </tr>
      </table>
    </div>
    <div>
      <table>
        <tr>
          <td>
            <input type="submit" value=" Registreer ">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>


<?php
  include str_replace("\\", DIRECTORY_SEPARATOR, BASE_NAMESPACE)."view/tpls/include/footer.php";
?>
