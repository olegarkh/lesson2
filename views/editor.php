<?php

require_once __DIR__.'/../models/table.php';

session_start();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    echo 'GET::id = '.$id."<br>";
}
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);
    echo 'SESSION::id = '.$id."<br>";
}
if (!empty($_POST['id'])){
    $id = $_POST['id'];
}

$table = new Table('articles');
$article = $table->getArticle($id);

?>

<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css" style="text/css">
  <title>Загрузить статью</title>
</head>
<body>
   <p><?php echo 'id = '.$article['id'].' ';?><a href="index.php">На главную</a></p>
   <form action="add.php" method="post">
       <input type="hidden" name="id" value="<?php echo $article['id'];?>">
       <p><label>Введите дату<br><input type="date" name="date" value="<?php echo $article['pub_date'];?>"></label></p>
       <p><label>Введите название статьи<br><input type="text" name="title" value="<?php echo $article['title']; ?>" size="100"></label></p>
       <p><label>Превью для статьи<br><textarea name="preview" rows="6" cols="90"><?php echo $article['preview'];?></textarea></label></p>
       <p><label>Текст статьи<br><textarea name="text" rows="16" cols="90"><?php echo $article['text'];?></textarea></label></p>
       <p><input type="submit" name="sub" value="Сохранить"></p>
   </form>
</body>
</html>