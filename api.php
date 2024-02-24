<?php
// Define the path to the cache directory
$cache_dir = __DIR__ . '/cache';

// Check if the cache directory exists, if not, create it
if (!is_dir($cache_dir)) {
    mkdir($cache_dir, 0777, true); // Recursive directory creation
}

function displayRandomGif($search_query, $limit = 1, $api_key = '3fm6hr4ds6FmBkO8uq42iFkN1disB12f')
{
    // Check if the GIF is cached
    $cache_file = __DIR__ . '/cache/' . urlencode($search_query) . '.json';
    if (file_exists($cache_file) && time() - filemtime($cache_file) < 3600) { // Cache expires after 1 hour
        // Retrieve the GIF from the cache
        $response = file_get_contents($cache_file);
    } else {
        // Fetch the GIF from the Giphy API
        $url = "https://api.giphy.com/v1/gifs/search?q=" . urlencode($search_query) . "&api_key=$api_key&limit=$limit";
        $response = file_get_contents($url);

        // Cache the response
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
