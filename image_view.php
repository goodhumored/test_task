<?php 
    require 'config.php';
    if (array_key_exists('im', $_GET)) {
        $img = $_GET['im'];
    } else {
        $img = 'default.png';
    }
    $views = get_views($img);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Просмотр изображения</title>
</head>
<body>
    <h1>Изображение <?=$img?></h1>
    <img src="image.php?im=<?=$img?>">
    <br>
    Статистика:
    <ul>
        <li>Просмотров: <?=$views + 1?></li>
    </ul>
</body>
</html>