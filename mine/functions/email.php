<?php
// permet d'afficher les users avec le parametre visible ou non visible 
function getEmail(): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM newsletter";
    $stmt = $pdo->query($query);
    
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function updateUser(int $id, string $nomUser, int $password, int $email, int $active = 0): bool
{
  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "UPDATE users SET nomUser = :nomUser, password = :password, email= :email, active= :active WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(':nomUser' => $nomUser, ':password' => $password, ':email' => $email, ':active' => $active, ':id' => $id));
}


function getUser(int $id): ?array
{
  $pdo = getPdo();
  $query = "SELECT * FROM users WHERE id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    return null;
  }

  return $row;
}