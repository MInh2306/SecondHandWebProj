<?php
session_start();
unset($_SESSION);
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
</head>

<body>
    <h3>ログアウトしました！</h3>
    <a href="login.html">トップページ</a>
</body>

</html>