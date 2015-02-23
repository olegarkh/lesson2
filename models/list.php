<?php

require_once __DIR__.'/article.php';
require_once __DIR__.'/table.php';

class ArticleList{

    function Show(){
         $table = new Table('articles');
         $items = $table->getAll('articles');
         //var_dump($items);
        foreach ($items as $item){
            echo $item."<br>";
        }
        //echo "Список: ". $items['title'];
         //include __DIR__ . '/../views/list.php';
    }
}

$al = new ArticleList;
$al->Show();

echo "Список 2";
var_dump($items);