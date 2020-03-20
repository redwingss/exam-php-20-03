<?php require_once '../views/layout/header.php'; ?>
<?php require_once '../functions/db.php'; ?>
<h1>formulaire inscript</h1>
<form method="POST">
  <div class="form-group">
    <label for="nomUser">Nom Utilisateur</label>
    <input type="text" class="form-control" id="nomUser" name="nomUser" placeholder="Nom Utilisateur..." />
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe..." />
  </div>
  <div class="form-group">
    <label for="password">Verification Mot de passe</label>
    <input type="passwordVerif" class="form-control" id="passwordVerif" name="passwordVerif" placeholder="Mot de passe..." />
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php 

$pdo = getPdo();

if (!empty($_POST) && !empty($_POST['nomUser']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])) {
  $nomUser = $_POST['nomUser'];
  $anneeSortie = $_POST['password'];
  $nbKm = $_POST['passwordVerif'];
  if ($_POST['passwordVerif'] == $_POST['password']){

  $query = 'INSERT INTO users (nomUser, password) VALUES (:nomUser, :password)';
  $stmt = $pdo->prepare($query);

  $insert = $stmt->execute([
      'nomUser' => "$nomUser",
      'password' => password_hash("password", PASSWORD_BCRYPT, ['cost' => 12]),
  ]);

  echo ($insert) ? "Insertion OK" : "Insertion échouée"; // TODO: pourquoi pas en alert si temps 
  }
else { ?>
    <div class="alert alert-danger" role="alert">
    Le mot de passe n'est pas le meme au 2 endroit ! <a href="/">try again</a>
  </div>
<?php }} ?>

