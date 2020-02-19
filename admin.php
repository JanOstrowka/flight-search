<?php
    require_once ('hasAccess.php');
    $sUserEmail = $_SESSION['sEmail'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Hi <?= $sUserEmail ?>. You can:</h1>

    <h3>Create & update flights: </h3>
    <br>
    <form action="">
        <input type="text">
    </form>

    <h3>Read & delete flights: </h3>
    <br>
    <form action="">
        <input type="text">
    </form>



</body>
</html>
