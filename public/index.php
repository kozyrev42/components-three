<?php

require '../vendor/autoload.php';

use Aura\SqlQuery\QueryFactory;

$queryFactory = new QueryFactory('mysql');  // создание Экземпляра класса 

//var_dump($queryFactory);
$select = $queryFactory->newSelect();  // Создайте запрос Select, используя следующие методы.

$select->cols(['*'])     // Чтобы добавить столбцы в выборку, используйте метод cols().'*'
        ->from('groups');    // по цепочке, вызываем следующий метод

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