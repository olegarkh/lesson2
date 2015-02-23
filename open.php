<?php

/*   файл не используется  */

require_once __DIR__ . '/models/table.php';
require_once __DIR__ . '/models/article.php';

$table = new Table('articles');

$article = new TArticle($table->getArticle(1));

$article->Show();

