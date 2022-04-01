<?php

require __DIR__.'./../vendor/autoload.php';

$url = '';
if (isset($_GET['url'])) {
  echo 'yes !';
} else {
  echo 'No !';
}
