<!-- FOOTER -->

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<footer>
  <center>
    <h1>Formulaire Newsletter</h1>
    <form method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email..."/>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    </center>
</footer>
<?php 
$insert = null;

if (!empty($_POST) && !empty($_POST['email'])) {
  $email = $_POST['email'];
  $insert = insertEmail($email);
}

if ($insert) { ?>
    <div class="alert alert-success" role="alert">
      Votre email a bien été enregistrée ! (fonctionne vraiment) <a href="/">Retour à la page</a>
    </div>
  <?php } ?>
  
  <?php if ($insert === false) { ?>
    <div class="alert alert-danger" role="alert">
      Une erreur est survenue
    </div>
  <?php } 

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
?>
</html>
<!-- /FOOTER -->