<?php

require '../vendor/autoload.php';

// мини роутинг
/* if($_SERVER['REQUEST_URI'] == '/home') {
        require '../app/controllers/homepage.php'
} */



//exit;
/*  ---------------------------------------------------- */
use App\QueryBuilder;

/* $my = new QueryBuilder();

$www = $my->mass;
var_dump($www);
exit; */
/* ------------------------------------------------------ */



use Aura\SqlQuery\QueryFactory;

$queryFactory = new QueryFactory('mysql');  // создание Экземпляра класса 

//var_dump($queryFactory);
$select = $queryFactory->newSelect();  // Создайте запрос Select, используя следующие методы.

$select->cols(['*'])     // Чтобы добавить столбцы в выборку, используйте метод cols().'*'
        ->from('email_list');    // по цепочке, вызываем следующий метод

//var_dump($select->getStatement()); // получаем, готовый sql-запрос


// a PDO connection
$pdo = new PDO("mysql:host=127.0.0.1;dbname=my_php;charset=utf8", "root", "");

// prepare the statement
$sth = $pdo->prepare($select->getStatement());

// bind the values and execute
$sth->execute($select->getBindValues());

// get the results back as an associative array
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);