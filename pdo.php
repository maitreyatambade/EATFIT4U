<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=eatfit4u_db', 'maitreya', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);