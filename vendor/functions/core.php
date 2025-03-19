<?php
session_start();

$link = mysqli_connect('localhost', 'root', '', 'thinkly_db');
$link->set_charset('utf8mb4');