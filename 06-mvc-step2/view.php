<?php
// подключаем модель
require_once('model.php');

$post = get_post_by_id($_GET['postId']);

// Подключаем наш вид
require 'templates/show.php';