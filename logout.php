<?php
setcookie('user', $_COOKIE['user'], time() - 3600, "/");
setcookie('admin', $_COOKIE['admin'], time() - 3600, "/");
setcookie('orderPrice', $subtotal, time() - 3600, "/");
setcookie('changeThisProduct', $thisProduct, time() - 3600, "/");
header("Location: /Shop");