<?php

require_once __DIR__.'/models/article.php';
require_once __DIR__.'/models/table.php';

//$article = new TArticle('');
//$article->Create();
$table = new Table('articles');
//var_dump($table);
//$news = new News($table);
//$news->ShowAll();
$articles = $table->getAll(); // getAll($news)

//$article = new TArticle($items);

include_once __DIR__.'/views/list.php';
//$article->showList();
