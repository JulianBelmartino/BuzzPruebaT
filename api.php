<?php

function displayRandomGif($search_query, $limit = 1, $width = 40, $height = 40, $api_key = '3fm6hr4ds6FmBkO8uq42iFkN1disB12f')
{

    $url = "https://api.giphy.com/v1/gifs/search?q=" . urlencode($search_query) . "&api_key=$api_key&limit=$limit&w=$width&h=$height";


    $response = file_get_contents($url);


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
