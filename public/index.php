<?php   /* фронт-контроллер приложения, точка входа + кастомный маршрутизатор */

require '../vendor/autoload.php';

// мини роутинг
if($_SERVER['REQUEST_URI'] == '/home') {
        require '../app/controllers/homepage.php';
}
