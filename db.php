<?php
require('libs/rb-mysql.php');

R::setup( 'mysql:host=localhost;dbname=foodstore', 'root', '' );

session_start();
?>