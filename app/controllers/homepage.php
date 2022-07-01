<?php // это мой контроллер, здесь я получаю результат

use App\QueryBuilder;   //   подключаем ПространствоИмён\Компонент

$db = new QueryBuilder();
//
//$data = $db->getAll('email_list');     //  запрос "показать Всё" 

//
/* $db->insert('email_list',[
    'first_name' => '5555',
    'last_name' => '555',
    'email' => '55'
]);  */   

//
//$db->update('email_list', '55', ['first_name' => 'zzz']);

// удаление по условию
$db->delete('email_list', 999999999);

//var_dump($data);
