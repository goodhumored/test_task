<?php 

function get_views($img) {
    global $stats_dir;
    $stats = file_get_contents($stats_dir.'stats.json');
    $stats_json = json_decode($stats, true);

    $views = 0;
    if (array_key_exists($img, $stats_json))
        return $stats_json[$img];
    else
        return 0;
}

$allowed_types = ['jpeg', 'webp', 'png', 'gif'];
$images_dir = 'images' . DIRECTORY_SEPARATOR;
$stats_dir = '';