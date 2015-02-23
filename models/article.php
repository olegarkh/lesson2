<?php

require_once __DIR__ . '/table.php';

class TArticle{
    public $id;
    public $date;
    public $title;
    public $text;
    public $preview;
    //public $table;

    public function __construct($article){
       $this->id = $article['id'];
       $this->date = $article['date'];
       $this->title = $article['title'];
       $this->text = $article['text'];
       $this->preview = $article['preview'];
       //$this->table = new Table('articles');
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
        /*$table = new Table('articles');
        $items = $table->getAll('articles');*/
        include __DIR__ . '/../views/list.php';
    }
    function Show(){
        $table = new Table('articles');
        //$article = $table->getArticle($this->title);
        $article = $table->getArticle($this->id);
        include __DIR__ . '/../views/article.php';
    }
}

class NewsArticle extends TArticle{
    public $type = 'news';
}

class ReportArticle extends TArticle{
    public $type = 'report';
}

class StoryArticle extends TArticle{
    public $type = 'story';
}

/*$article = new Article('12/12/12','Важная новость','бла бла бла','Олег');
$article->Show();
*/