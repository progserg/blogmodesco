<?php
//подключаем автозагрузку
include 'autoload.php';

$route = new \Controller\Router();

//добавляем доступные роуты сайта
$route->add('/', 'Blog/index');      //добавляем контроллер главной страницы
$route->add('blog', 'Blog/get');
$route->add('add', 'Blog/add');
$route->add('del', 'Blog/del');

//обрабатываем запрос пользователя
$route->redirect($_GET, $_POST);