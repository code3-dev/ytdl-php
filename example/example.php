<?php

use pira\YTDL;

require_once 'vendor/autoload.php';

try {
    $ytdl = new YTDL('https://www.youtube.com/watch?v=OAr6AIvH9VY');
    $ytdl->setQuality('720');
    $response = $ytdl->sendRequest();
    print_r($response);
} catch (Exception $e) {
    echo $e->getMessage();
}
