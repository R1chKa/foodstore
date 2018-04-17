<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="img\logo.png" alt="none" height="120" width="120">
        </div>
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php" class="main"> Головна </a>
                </li>
                <li>
                    <a href="" class="discounts"> Акції </a>
                </li>
                <li>
                    <a href="" class="contacts"> Контакти </a>
                </li>
                <li>
                    <a href="" class="delivery"> Оплата і доставка </a>
                </li>
                <li>
                    <?php if(isset($_SESSION['logged_user'])) :?>
                    <a href="reg/profile.php" class="login">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php else :?>
                    <a href="reg/login.php" class="login">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </a>
                    <?php endif;?>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="main-content">
            <div class="items"> <?php 
                $foods = R::find('food');
                foreach($foods as $food) {
          echo '<div class="option block">
                    <div class="img">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="f-name">
                        <p class="strleft">';
                            echo $food->f_name;
                        echo '</p>
                        <p class="strright">'; echo $food->f_weight; echo'</p>
                    </div>
                    <div class="f-price">
                    <p>'; echo $food->f_price; echo '</p>
                    </div>
                    <div class="buy-btn"><button type="submit">Замовити</button></div>
                </div>'; 
                } ?>
            </div>
        </div>
        <div class="footer">
            <div class="copyrigth">
                <p>Copyright &copy; 2018</p>
            </div>
            <div class="socials">
                <img src="img/fb.png" alt="" height="50" width="50">
                <img src="img/insta.png" alt="" height="50" width="50">
                <img src="img/yt.png" alt="" height="50" width="50">
            </div>
        </div>
    </main>
</body>


</html>