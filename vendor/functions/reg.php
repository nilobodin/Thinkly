<?php
require 'core.php';

if ($_POST) {
    $randomNickname = 'user' . rand(0, 99999999);
    if (empty($_POST['nickname'])) {
        $_POST['nickname'] = $randomNickname;
    }
    $date = date('d.m.y');
    $link->query("INSERT INTO `users`(
        `nickname`,
        `login`, 
        `password`,
        `avatar`,
        `created_at`) VALUES (
            '{$_POST['nickname']}',
            '{$_POST['login']}',
            '{$_POST['password']}',
            '/assets/img/avatar/user1.png',
            '{$date}')");
    header("location: {$_SERVER['HTTP_REFERER']}");
    exit;
}