<?php
  setcookie('log', $login, time() - 3600 * 24 * 30, "/"); // kill cookie for whole web-site
  echo true;
?>
