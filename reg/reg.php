<?php
require('../db.php');

$data = $_POST;
if(isset($data['do_signup'])) {
    // reg

    $errors = array();
    if(trim($data['login']) == '') {
        $errors[] = 'Введіть логін!';
    }

    if(trim($data['password']) == '') {
        $errors[] = 'Введіть пароль!';
    }
    if(R::count('users', 'login = ?', array($data['login'])) > 0) {
        $errors[] = 'Користувач з таким логіном уже існує!';
    }

    if(empty($errors)) {
        // all good
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;">Реєстрація пройшла успішно!</div>';
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
    <title>Реєстрація</title>
    <link rel="stylesheet" href="reg.css">
    <script src="../index.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>

<body>
    <div id="login-form">
        <h2>
            Реєстрація<i class="fas fa-home" onclick="goToLink('../index.php')"></i>
        </h2>
        
        <form action="../reg/reg.php" method="POST">
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
                    <input type="submit" name="do_signup" value="ЗАРЕЄСТРУВАТИСЯ">
                </p>
            </fieldset>
        </form>
    </div>
</body>

</html>