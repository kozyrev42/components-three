<?php

namespace App;  // определение пространства имён для компонента

use Aura\SqlQuery\QueryFactory;    // подключение пространства имён с классом из него
use PDO;    // подключаем встроенный в PHP namespace, для использования его в нутри Классов

class QueryBuilder
{
    public function getAll($table)
    {

        $queryFactory = new QueryFactory('mysql');  // создание Экземпляра класса, подключенного из vendor

        //var_dump($queryFactory);
        $select = $queryFactory->newSelect();  // Создайте запрос Select, используя следующие методы.

        $select->cols(['*'])     // Чтобы добавить столбцы в выборку, используйте метод cols().'*'
            ->from($table);    // по цепочке, вызываем следующий метод

        //var_dump($select->getStatement()); // получаем, готовый sql-запрос

        $pdo = new PDO("mysql:host=127.0.0.1;dbname=my_php;charset=utf8", "root", "");

        $sth = $pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        var_dump($result);
    }
}
