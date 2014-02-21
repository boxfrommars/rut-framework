<?php

$link = mysql_connect('localhost', 'myuser', 'mypassword');
mysql_select_db('blog_db', $link);

$result = mysql_query('SELECT id, title FROM post', $link);

$result = mysql_query('SELECT date, title, content FROM post WHERE id=' . $_GET['postId'], $link);
$post = mysql_fetch_array($result, MYSQL_ASSOC);

mysql_close($link);

// Подключаем наш вид
require 'templates/show.php';