<?php
    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        // validating
        $sCorrectEmail = 'admin@email.com';
        $sCorrectPassword = 'password';
        $sUserEmail = $_POST['txtLogin'];
        $sUserPassword = $_POST['txtPassword'];

        if ($sCorrectEmail == $sUserEmail && $sCorrectPassword == $sUserPassword) {
            session_start();

            $_SESSION['sEmail'] = $sUserEmail;
            header('Location: admin.php');
            exit();
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login">
    <title>LOGIN</title>
</head>
<body>
<h1>HOME</h1>
<form action="login.php" method="POST">
    <input name="txtLogin" type="text" placeholder="login">
    <input name="txtPassword" type="text" placeholder="password">
    <button>LOGIN</button>
</form>
</body>
</html>