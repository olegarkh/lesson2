<?php

require_once __DIR__.'/../models/table.php';

$table = new Table('articles');

if(!empty($_GET['id'])) {
    $article = $table->getArticle($_GET['id']);
}
?>

<!DOCTYPE html>                                   <!-- отображаем на экране -->
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo $article['title'];?></title>
</head>
<body>
    <p><a href="../index.php">На главную </a> &nbsp; <a href="editor.php?id=<?php echo $article['id']?>"> Редактировать</a></p>
    <h3><?php echo $article['title'];?></h3>
    <p><?php echo $article['date'];?></p>
    <p><?php echo $article['text'];?></p>

</body>
</html>