<?php
// permet d'afficher les users avec le parametre visible ou non visible 
function getUsers(string $active): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);
    
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// TODO: connexion grace a la page EditUser
function updateUser(int $id, string $nomUser, int $password, int $email, int $active = 0, int $choixUser): bool
{
  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "UPDATE users SET nomUser = :nomUser, password = :password, email= :email, active= :active, choixUser= :choixUser, WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(':nomUser' => $nomUser, ':password' => $password, ':email' => $email, ':active' => $active, ':choixUser' => $choixUser, ':id' => $id));
}

