<?php
// index.php

// нужные модели и библиотеки подключаем здесь в одном месте
require_once 'post_model.php';
require_once 'controllers.php';

// фронт-контроллер решает, какой конроллер/действие должно выполнятся (маршрутизация, роутинг)
$uri = $_SERVER['REQUEST_URI'];
if ('/index.php' == $uri) {
    list_action();

} elseif ('/index.php/show' == $uri && isset($_GET['id'])) {
    show_action($_GET['id']);

} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}