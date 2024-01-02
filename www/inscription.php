<?php require(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "init.php") ?>
<?php

if ($_POST) {
  // debug($_POST);
  $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['slug']);
  if (!$verif_caractere || (strlen($_POST['slug']) < 1 || strlen($_POST['slug']) > 20)) // 
  {
      $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
  } else {
      $utilisateur = executeRequete("SELECT * FROM utilisateur WHERE slug='$_POST[slug]'");
      if ($utilisateur->num_rows > 0) {
          $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
      } else {
          $_POST['passwrd'] = password_hash($_POST['passwrd'], PASSWORD_BCRYPT);
          foreach ($_POST as $indice => $valeur) {
              $_POST[$indice] = htmlEntities(addSlashes($valeur));
          }
          executeRequete("INSERT INTO utilisateur (slug, email, passwrd, is_admin) VALUES ('$_POST[slug]', '$_POST[email]', '$_POST[passwrd]', 0)");
          // $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
          header('location: connexion.php');
      }
  }
}

?>




<!-- executeRequete("INSERT INTO blog.utilisateur
// // (id_user, slug, email, passwrd, is_admin)
// // VALUES(0, 'test2', 'test2@gmail.com', 'secret2', 0);");
// // -->






<?php include_once(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "haut.php") ?>

<h1>Inscriptions</h1>
<?php echo $contenu ?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Votre pseudo</label>
    <input name="pseudo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre pseudo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Votre mail</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email">
    <small id="emailHelp" class="form-text text-muted">Nous partagerons jamais votre email.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Votre mot de passe</label>
    <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php include_once(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "bas.php") ?>

