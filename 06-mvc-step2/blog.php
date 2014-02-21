<?php

// подключаем модель
require_once('model.php');

// получаем записи
$posts = get_all_posts();

// Подключаем наш вид
require 'templates/list.php';