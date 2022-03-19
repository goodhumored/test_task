<?php 
require 'config.php';

if (!array_key_exists('im', $_GET)) {
    header("HTTP/1.1 404 Not Found");
    exit('Изображение не найдено');
}

$path = $images_dir . $_GET['im'];

if (!file_exists($path)) {
    header("HTTP/1.1 404 Not Found");
    exit('Изображение не найдено');
}

$stats = file_get_contents($stats_dir.'stats.json');
$stats_json = json_decode($stats, true);

if (array_key_exists($_GET['im'], $stats_json))
    $stats_json[$_GET['im']]++;
else
    $stats_json[$_GET['im']] = 1;

$stats = json_encode($stats_json);
file_put_contents($stats_dir.'stats.json', $stats);

$type = explode('.', $_GET['im'])[1];

if ($type == 'jpg')
    $type = 'jpeg';

if (!in_array($type, $allowed_types)) {
    header("HTTP/1.1 503 Forbidden");
    exit('Запрещённый тип изображения');
}

$image = fopen($path, 'rb');

header("Content-Type: image/".$type);
header("Content-Length: " . filesize($path));
fpassthru($image);
exit;