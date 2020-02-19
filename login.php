<?php
    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        // validating
        $sCorrectLogin = 'admin';
        $sCorrectPassword = 'password';
        $sUserLogin = $_POST['txtLogin'];
        $sUserPassword = $_POST['txtPassword'];

        if ($sCorrectLogin == $sUserLogin && $sCorrectPassword == $sUserPassword) {
            session_start();
            $_SESSION['sLogin'] = $sUserLogin;
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
</head>
<body>
    <form action="login.php" method="POST">
        <h1>HOME</h1>
        <input name="txtLogin" type="text" placeholder="login">
        <input name="txtPassword" type="text" placeholder="password">
        <button>LOGIN</button>
    </form>
</body>
</html>