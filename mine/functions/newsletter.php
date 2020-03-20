<?php
require_once '../functions/db.php';
require_once '../functions/voitures.php';

// comme insertVoiture
function insertEmail(string $email): bool
{
  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "INSERT INTO newsletter (email) VALUES (:email)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    'email' => $email
  ]);
}

