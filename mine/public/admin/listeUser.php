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
require_once '../../functions/users.php';
require_once '../../functions/db.php';


$actif = $_GET['actif'] ?? "all";
$users = getUsers($actif);
?>

<h1>Administration - Liste des users</h1>



<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">NomUser</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Active</th>
      <th scope="col">Type User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <!-- avec bouton edit, redirige vers page editUser -->
        <td><a href="/admin/editUsers.php ?id=<?php echo $user['id']; ?>" class="btn btn-warning">Editer</a></td>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['nomUser']; ?></td>
        <td><?php echo $user['password']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['active']; ?></td>
        <td><?php echo $user['choixUser']; ?></td>
        <td>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

