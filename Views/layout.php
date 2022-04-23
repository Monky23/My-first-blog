<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fontawesome link -->
  <script src="https://kit.fontawesome.com/e4eed1bb33.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- My own CSS -->
  <link href="/css/style.css" rel="stylesheet">
  <title>Hello, world!</title>
</head>

<body class="container-fluid">
  <header class="row">
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="/img/photoperso.jpg" alt="Photo de numeric experiences" width="50" height="50" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts">Les derniers articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['auth'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Se déconnecter</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="hero">
      <h1>Numeric Experiences</h1>
      <h2>Des methodes en fonction de vos conditions !</h2>
    </div>
  </header>
  <main>
    <div class="container">
      <?= $content ?>
    </div>
  </main>
  <footer class="row">
    <div class="col-md-4 foot">
      <div><i class="fas fa-map-marker-alt"></i>
        Numeric Experiences<br>
        23 Rue des Martyrs<br>
        75009 Paris
      </div>
      <div><i class="fas fa-mobile-alt"></i>
        +33 6 88 88 88 88
      </div>
      <div><i class="fas fa-envelope"></i>
        <a href="mailto:lapaixjeanmichel@gmail.com" title="envoyez moi un mail en cliquant sur ce lien">Join Us by email</a>
      </div>
    </div>
    <div class="col-md-4 foot">
      <img src="/img/logo.png" alt="photo de numeric experiences" id="logofoot">
    </div>
    <div class="col-md-4 foot">
      <a href="/login" title="lien vers la politique de confidentialités">Connexion</a><br>
      <div>
        <h3>Rendez-vous sur les réseaux sociaux</h3>
        <a href="https://www.facebook.com/jeanmichel.lapaix.927" target="_blank" title="lien vers mon profil facebook"><i class="fab fa-facebook-square fa-3x"></i>
        </a>
        <a href="https://www.instagram.com/jeanmichel.experiences/?hl=fr" target="_blank" title="lien vers mon profil instagram"><i class="fab fa-instagram fa-3x"></i></a>
        <a href="https://twitter.com/paix_jean" target="_blank" title="lien vers mon profil twitter"><i class="fab fa-twitter fa-3x"></i></a>
        <a href="https://www.linkedin.com/in/jean-michel-la-paix-246975129/" target="_blank" title="lien vers mon profil linkedin"><i class="fab fa-linkedin fa-3x"></i></a>
        <a href="https://github.com/Monky23" target="_blank" title="lien vers mon profil Github"><i class="fab fa-github fa-3x"></i></a>
      </div>
    </div>
  </footer>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>