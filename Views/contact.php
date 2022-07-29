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

<form name="contact_form" method="post" action="">
  <table width="500">
    <tr>
      <td valign="top">
        <label for="name">name *</label>
      </td>
      <td valign="top">
        <input type="text" name="name" maxlength="50" size="30" 
        value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="firstname">Préname *</label>
      </td>
      <td valign="top">
        <input type="text" name="firstname" maxlength="50" size="30" 
        value="<?php if (isset($_POST['firstname'])) echo htmlspecialchars($_POST['firstname']); ?>">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="email">Email Addresse *</label>
      </td>
      <td valign="top">
        <input type="text" name="email" maxlength="80" size="30" 
        value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
      </td>
    <tr>
      <td valign="top">
        <label for="message">message *</label>
      </td>
      <td valign="top">
        <textarea name="message" cols="28" rows="10"><?php if (isset($_POST['message'])) 
        echo htmlspecialchars($_POST['message']); ?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
        <input type="submit" value=" Envoyer ">
      </td>
    </tr>
  </table>
</form>
