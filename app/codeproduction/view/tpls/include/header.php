<html>
  <head>
    <title>Training website</title>
    <meta charset="utf-8"/>
    <link href="css/main.css" rel="stylesheet"/>
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <section class="logo">
          <img src="img/logo.png"/>
        </section>
        <section class="header-text">
          <h1>Training centrum Den Haag</h1>
        </section>
        <section class="login">
          <?php
            if ($typegebruiker !== 'bezoeker') {
              echo '<a href="?control='.$typegebruiker.'&action=logout">uitloggen</a>';
            } else {
              echo "
              <form method='POST' autocomplete='off'>
                <table>
                  <tr>
                    <td>
                      <input type='text' autocomplete='off' placeholder='gebruikersnaam' name='usn' required/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type='password' autocomplete='off' name='ww' placeholder='wachtwoord' required/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan='2'>
                      <input type='submit' value='inloggen'/>
                      <input type='reset' value='reset'/>
                    </td>
                  </tr>
                </table>
              </form>";
            }
          ?>
        </section>
      </div>
      <div class="nav">
        <ul>
          <?php
            switch($typegebruiker) {
              case 'bezoeker':
                echo '
                <li><a href="?control=bezoeker&action=default">Home</a></li>
                <li><a href="?control=bezoeker&action=trainings">Trainings Aanbod</a></li>
                <li><a href="?control=bezoeker&action=register">Lid worden</a></li>
                <li><a href="?control=bezoeker&action=gedragsregels">Gedragsregels</a></li>
                <li><a href="?control=bezoeker&action=contact">Locatie & contact</a></li>
                ';
                break;
              case 'lid':
                echo '
                <li><a href="?control=lid&action=default">Home</a></li>
                <li><a href="?control=lid&action=inschrijven">Inschrijven</a></li>
                <li><a href="?control=lid&action=lidBeheer">Lid beheer</a></li>
                <li><a href="?control=lid&action=overzicht">Overzicht</a></li>';
                break;
              case 'instructeur':
                echo '
                <li><a href="?control=instructeur&action=default">Home</a></li>
                <li><a href="?control=instructeur&action=lessenoverzicht">Lessen overzicht</a></li>
                <li><a href="?control=instructeur&action=beheerGebruikers">Instructeur beheer</a></li>';
                break;
              case 'admin':
                echo '
                <li><a href="?control=admin&action=default">Home</a></li>
                <li><a href="?control=admin&action=instructeurs">Instructeurs</a></li>
                <li><a href="?control=admin&action=leden">Leden</a></li>
                <li><a href="?control=admin&action=trainingsvormen">Trainingsvormen</a></li>';
                break;
            }
          ?>
        </ul>
      </div>
