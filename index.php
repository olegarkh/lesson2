<?php

require_once __DIR__.'/models/table.php';

$table = new Table('articles');
$articles = $table->getAll('news');   // getAll($news)

include_once __DIR__.'/views/list.php';

