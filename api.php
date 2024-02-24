<?php
$cache_dir = __DIR__ . '/cache';


if (!is_dir($cache_dir)) {
    mkdir($cache_dir, 0777, true);
}

function displayRandomGif($search_query, $limit = 1, $api_key = '3fm6hr4ds6FmBkO8uq42iFkN1disB12f')
{
    $cache_file = __DIR__ . '/cache/' . urlencode($search_query) . '.json';
    if (file_exists($cache_file) && time() - filemtime($cache_file) < 3600) {
        $response = file_get_contents($cache_file);
    } else {
        $url = "https://api.giphy.com/v1/gifs/search?q=" . urlencode($search_query) . "&api_key=$api_key&limit=$limit";
        $response = file_get_contents($url);

        file_put_contents($cache_file, $response);
    }

    if ($response === false) {
        return "Error fetching data from Giphy API";
    } else {
        $data = json_decode($response, true);
        if (!empty($data['data'])) {
            $gif = $data['data'][0];
            return '<img src="' . $gif['images']['original']['url'] . '" alt="GIF">';
        } else {
            return 'No GIFs found';
        }
    }
}
