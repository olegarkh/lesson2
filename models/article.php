<?php

require_once __DIR__ . '/table.php';

abstract class TArticle{
    public $id;
    public $date;
    public $title;
    public $text;
    public $preview;

    public function __construct($article){
       $this->id = $article['id'];
       $this->date = $article['date'];
       $this->title = $article['title'];
       $this->text = $article['text'];
       $this->preview = $article['preview'];
    }
    protected function editor(){
        header('Location:'. __DIR__.'/views/editor.php');
    }
    public function Create(){
        editor();
    }
    public function SaveNew(){
        session_start();
        $article = $this->table->Add($this);
        $_SESSION['id'] = $article['id'];
        editor();
    }
    public function Open(){
        editor();
    }
    public function Save(){
        $table = new Table('articles');
        $table->Update($this);
        $table->close();
        editor();
    }

    function Edit(){
        header('Location:'. __DIR__.'/views/editor.php');
       //include __DIR__.'/../open.php' ;
    }
    function View(){
        header('Location:'. __DIR__.'/views/article.php');
    }
    function showList(){
        $table = new Table('articles');
        $articles = $table->getAll();
        include __DIR__ . '/../views/list.php';
    }
    function Show(){
        $table = new Table('articles');
        $article = $table->getArticle($this->id);
        include __DIR__ . '/../views/article.php';
    }
}

class News extends TArticle{
    public $type = 'news';
}

class Report extends TArticle{
    public $type = 'report';
}

class Story extends TArticle{
    public $type = 'story';
}
