<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Список статей</title>
</head>
<body>
  <a href="add.php">Добавить статью</a> <!--views/editor.php-->
  <?php foreach ($articles as $article):?>
      <h3><?php echo $article['title'];?></h3>
      <p><?php echo $article['pub_date'];?></p>
      <p><?php echo $article['preview'];?></p>
      <a href="views/article.php<?php echo "?id=".$article['id'];?>"> Читать далее...</a>
      <a href="views/editor.php<?php echo "?id=".$article['id'];?>"> Редактировать статью</a>
  <?php endforeach; ?>
</body>
</html>