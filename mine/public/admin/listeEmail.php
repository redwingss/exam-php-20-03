<?php
// require_once '../../functions/utils.php';
// Vérification de la connexion avant même toute sortie de code (require, doctype, etc...)
/* session_start();
if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {
  echo "Vous êtes connecté";
} else {
  redirect('/admin/login.php');
}
*/
require_once '../../views/layout/header.php';
require_once '../../functions/email.php';
require_once '../../functions/db.php';


$actif = $_GET['actif'] ?? "all";
$emails = getEmail($actif);
?>

<h1>Administration - Liste des Emails</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($emails as $email) { ?>
      <tr>
        <!-- avec bouton edit, redirige vers page editUser -->
        <td><a href="/admin/editUsers.php ?id=<?php echo $email['id']; ?>" class="btn btn-warning">Editer</a></td>
        <td><?php echo $email['id']; ?></td>
        <td><?php echo $email['email']; ?></td>
        <td>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>


