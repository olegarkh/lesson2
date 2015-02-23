<?php

//require __DIR__.'/models/sql.php';
require_once __DIR__.'/models/article.php';
require_once __DIR__.'/models/table.php';
session_start();

//echo "Файл add !<br>";
$article = new TArticle($_POST);
//$table = new Table('articles');
if ($article->id) {
    //echo 'не пустой id = ' . $article->id . '$article[title] = '.$article->title. '<br>';
    $table = new Table('articles');
    $table->Update($article);
    $table->Close();
    include_once __DIR__."/views/editor.php";
    //header('Location:'. __DIR__.'/views/editor.php');
    exit;

}
else{
    //echo 'пустой id = '. $article->id . '$article[title] = '.$article->title. '<br>';
    $table = new Table('articles');
    $table->Add($article);
    $article = $table->getLast();
    $table->Close();

    $_SESSION['id'] = $article['id'];

    include_once __DIR__.'/views/editor.php';
    //header('Location:'. __DIR__.'/views/editor.php');
    exit;
    //require(__DIR__.'/views/editor.php');

}
