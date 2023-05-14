<?php
session_start();

if (isset($_SESSION['failed_login_attempts']) && $_SESSION['failed_login_attempts'] >= 3) {
    $remaining_time = 60 - (time() - $_SESSION['last_failed_attempt']);
    if ($remaining_time > 0) {
        echo "Вы использовали все попытки входа. Попробуйте еще раз через $remaining_time секунд.";
        exit;
    } else {
        $_SESSION['failed_login_attempts'] = 0;
    }
}

if (isset($_POST['Submit'])) {
    if ($_POST['user_name'] == "StarProxima" && $_POST['user_pass'] == "megaStrongPassword123") {
        $_SESSION['logged_user'] = $_POST['user_name'];
        header("Location: secretpage.php");
        exit;
    } else {
        $_SESSION['failed_login_attempts'] = isset($_SESSION['failed_login_attempts']) ? $_SESSION['failed_login_attempts'] + 1 : 1;
        $_SESSION['last_failed_attempt'] = time();

        if ($_SESSION['failed_login_attempts'] >= 3) {
            echo "Вы использовали все попытки входа. Попробуйте еще раз через 1 минуту.";
            exit;
        } else {
            echo "Вы ввели неверный пароль!";
        }
    }
}
?>

<link rel="stylesheet" type="text/css" href="style.css">

<html>
    <head>
        <title>Sign up</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <form action="login.php" method="post">

            <?php if (isset($_SESSION['failed_login_attempts'])): ?>
            <p>Осталось попыток: <?php echo 3 - $_SESSION['failed_login_attempts'];?></p>
            <?php endif;?>

            <label class="text" for="user_name">Username:</label>
            <input class="txbox" type="text" id="user_name" name="user_name"><br>
            <label class="text" for="user_pass">Password:</label>
            <input class="txbox" type="password" id="user_pass" name="user_pass"><br>
            <input class="submit" type="submit" name="Submit" value="Войти">
        </form>
    </body>
</html>