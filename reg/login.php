<?php
require('../db.php');

$data = $_POST;
if(isset($data['do_login'])) {
    // reg

    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if($user) {
        if(password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
        } else {
            $errors[] = 'Пароль введено неправильно!';
        }
    } else {
        $errors[] = 'Користувача з таким логіном не знайдено';
    }
    if(trim($data['login']) == '') {
        $errors[] = 'Введіть логін!';
    }
    if(trim($data['password']) == '') {
        $errors[] = 'Введіть пароль!';
    }
    if(empty($errors)) {
        // echo '<div style="color: green;">Ласкаво просимо!</div>';
        header("Location: ../index.php");
        // exit();
    } else {
        echo '<div style="color: red;">ERROR: '.array_shift($errors).'</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вхід в обліковий запис</title>
    <link rel="stylesheet" href="reg.css">
    <script src="../index.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>
<body>
<div id="login-form">
        <h2>
            Авторизація<i class="fas fa-home" onclick="goToLink('../index.php')"></i>
        </h2>
        <form action="../reg/login.php" method="POST">
            <fieldset>
                <p>
                    <label for="login">Логін:</label>
                </p>
                <p>
                    <input type="login" name="login" placeholder="Логін" value="<?php echo @$data['login']; ?>"> 
                </p>

                <p>
                    <label for="password">Пароль:</label>
                </p>
                <p>
                    <input type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
                </p>

                <p class="buttons">
                    <input type="submit" name="do_login" value="УВІЙТИ"><input name="do_signup" value="ЗАРЕЄСТРУВАТИСЯ" onclick="goToLink('reg.php')">
                </p>
            </fieldset>
        </form>
    </div>
</body>
</html>