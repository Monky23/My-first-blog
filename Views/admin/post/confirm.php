<?php

$uploaddir = 'uploads/';
var_dump(is_writable($uploaddir));
var_dump(realpath($uploaddir));

$uploadfile = $uploaddir . basename($_FILES['picture']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';

echo $uploadfile;
var_dump($uploadfile);

echo '</pre>';

echo 'file : ';
$file = $_FILES['picture']['name'];
var_dump($file);

echo '</pre>';

echo 'basefile : ';
$basefile = basename($_FILES['picture']['name']);
var_dump($file);
if (isset($uploadfile))
{
   echo "ceci prouve l'existance de";
   var_dump($uploadfile);
}
 ?>