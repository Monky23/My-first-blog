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
<div class="registration-form">

    <form action="/registration" method="POST">
        <h2 class="text-center">Inscription</h2>
        <div class="form-group">
            <label for="username">Choisissez un pseudo<span>*</span></label>
            <input type="text" name="username" id="username" class="form-control" 
            placeholder="Pseudo *" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="email">Saisissez votre adresse mail<span>*</span></label>
            <input type="email" name="email" id="email" class="form-control" 
            placeholder="Email *" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Initialisez votre mot de passe<span>*</span></label>
            <input type="password" name="password" id="password" 
            class="form-control" placeholder="Mot de passe *" 
            required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password_retype">Ressaississez votre mot de passe<span>*</span></label>
            <input type="password" name="password_retype" 
            class="form-control" placeholder="Re-tapez le mot de passe *" 
            required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="phone_number">Votre numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" 
            class="form-control" placeholder="Numéro de téléphone" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="description">Biographie</label>
            <textarea name="description" id="description" rows="8" class="form-control">
        </textarea>
        </div>
        <p><span>*</span>Tout les champs accompagnés d'une étoile doivent
            obligatoirement être renseignés</p>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
        </div>
    </form>
</div>