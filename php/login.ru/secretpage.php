<?php
    session_start();
    echo session_id();
    if(!isset($_SESSION['logged_user'])){
        header("Location: login.php");
        exit;
    }
?>

<html>

    <head>
        <title>Secret page</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <p>Secret page for <?php echo $_SESSION['logged_user']; ?> :X</p>
    </body>
</html>