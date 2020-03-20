<?php
 require_once '../public/admin/login.php';
 require_once '../functions/db.php';
$pdo = getPdo()

//TODO: verifie si les champs ne sont pas vide 
// recupere les donnees de users 
// et si les == users alors $_SESSION (status) == connected 

if (isset($_POST['nomUser']) && isset($_POST['password'])) {
    $query = "SELECT * FROM users WHERE 1=1 AND nomUser LIKE $nomUser AND password LIKE $password";
}
    function getPush(): ?array
{
  $pdo = getPdo();
  $query = "SELECT * FROM users WHERE 1=1 AND nomUser LIKE $nomUser AND password LIKE $password";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
  'login' => $nomUser,
  'password' => $password
  ]);

    $stmt->fetch(PDO::FETCH_ASSOC);

}