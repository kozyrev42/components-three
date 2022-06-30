<?php // это мой контроллер, здесь я получаю результат

use App\QueryBuilder;   //   подключаем ПространствоИмён\Компонент

$db = new QueryBuilder();
$data = $db->getAll('email_list');

var_dump($data);
