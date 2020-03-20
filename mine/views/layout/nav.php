<!-- NAV -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Page d'accueil publique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/inscription.php">inscription publique</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/listeUser.php">liste d'utilisateurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/listeEmail.php">liste d'emails</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/newUser.php">créer un nouvel utilisateur</a>
      </li>
      <?php
      // Ignorer les erreurs éventuelles liées à un appel précédent de session_start
      // Si session_start a déjà été appelée dans un fichier "parent", alors la ligne ci-dessous va renvoyer une erreur
      // Ce n'est pas recommandé d'appliquer ce genre de technique, car ça relève de la rustine
      // et non d'une architecture solide
      // Dans une architecture mieux conçue (si on avait eu plus de temps),
      /* on aurait centralisé l'appel à session_start()
      @session_start();
      if (isset($_SESSION) && $_SESSION['state'] == 'connected') { ?>
        <li class="nav-item">
          <a class="nav-link" href="/admin/logout.php">Déconnexion</a>
        </li>
      <?php } ?>
      */ ?>
    </ul>
  </div>
</nav>
<!-- /NAV -->


