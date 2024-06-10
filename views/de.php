<?php 
setcookie('langue', 'de', time() + 365*24*3600, null, null, false, true);
header('Location: home');