<?php if (isset($_SESSION['errors'])) : ?>

  <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
    <?php foreach ($errorsArray as $errors) : ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
          <li><?= $error ?></li>
        <?php endforeach ?>
      </div>
    <?php endforeach ?>
  <?php endforeach ?>

<?php endif ?>

<?php session_destroy(); ?>

<h2>Contact</h2>
<!---->
<form class="contact mb-5" name="contact_form" method="post" action="">
  <div class="mb-3">
    <label for="name" class="form-label">Nom<span>*</span></label>
    <input type="text" class="form-control" id="name" required name="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Prénom<span>*</span></label>
    <input type="text" class="form-control" id="firstname" required name="firstname" value="<?php if (isset($_POST['firstname'])) echo htmlspecialchars($_POST['firstname']); ?>">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Adressse mail<span>*</span></label>
    <input type="email" class="form-control" id="email" required name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
  </div>
  <div class="mb-3">
    <label for="textarea1" class="form-label">Message<span>*</span></label>
    <textarea class="form-control" id="textarea1" rows="3" name="message" required>
        <?php if (isset($_POST['message'])) echo htmlspecialchars($_POST['message']); ?>
    </textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="checkbox" required>
    <label class="form-check-label" for="checkbox">Nous avons besoin de votre
      consentement<span>*</span></label>
  </div>
  <p>
    En soumettant ce formulaire, j'accepte que les informations saisies dans ce formulaire soient
    utilisées, exploitées, traitées pour permettre à l'association "Les films de plein air" de me
    recontacter afin de traiter ma demande.
  </p>
  <button type="submit" class="btn btn-primary">Envoyer</button>
  <p><span>*</span>Tous les champs sont obligatoires.</p>
</form>