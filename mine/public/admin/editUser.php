<?php
require_once '../../functions/voitures.php'; // a changer
require_once '../../views/layout/header.php';
?>

<h1>Editer un User</h1>

<?php if (!isset($_GET['id'])) { ?>
  <div class="alert alert-danger" role="alert">
    Paramètre manquant : id, check l'url
  </div>
  <?php
  exit;
}

// Si on arrive à ce stade du script, alors on n'est pas rentré dans le if
// Donc cela signifie qu'on a un paramètre GET id
$id = $_GET['id'];

if (isset($_POST['nomUser']) && isset($_POST['password']) && isset($_POST['email'])) {
  $nomUser = $_POST['nomUser'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $active = isset($_POST['active']) ? 1 : 0;
  $choixUser = $_POST['choixUser'];

  $update = updateUser(
    $id,
    $nomUser,
    $password,
    $email,
    $active,
    $choixUser
  );
  
  var_dump($update);
}

$userTest = getUser($id);

if ($userTest == null) {?>
  <div class="alert alert-danger" role="alert">
    L'utlisateur demandée n'existe pas !
  </div>
  <?php
  exit;
}

?>
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
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email..." />
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="active" name="active"  />
    <label class="form-check-label" for="visible">Active</label>
  </div>
  <div class="form-group">
  <select name="choixUser">
    <option value="utilisateur" selected>utilisateur</option>
    <option value="admin">admin</option>
  </select>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
require_once '../../views/layout/footer.php';
