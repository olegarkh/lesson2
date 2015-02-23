<?php

require_once __DIR__.'/models/article.php';
require_once __DIR__.'/models/table.php';
session_start();

$news = new News($_POST);

if ($news->id) {

    $table = new Table('articles');
    $table->Update($news);
    $table->Close();
    include_once __DIR__."/views/editor.php";
    exit;

}
else{
    $table = new Table('articles');
    $table->Add($news);
    $article = $table->getLast();
    $table->Close();

    $_SESSION['id'] = $article['id'];

    include_once __DIR__.'/views/editor.php';
    exit;
}
