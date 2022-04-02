<?php

require __DIR__.'./../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

$url = '';
if (isset($_GET['url'])) {
  echo 'yes !';
} else {
  echo 'No !';
}
