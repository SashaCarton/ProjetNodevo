<?php 
setcookie('langue', 'en', time() + 365*24*3600, null, null, false, true);
header('Location: home');