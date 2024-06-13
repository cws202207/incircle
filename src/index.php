<?php
require 'vendor/autoload.php'; // Composerのオートロードを使用する場合

$client = new MongoDB\Client("mongodb://mongo:27017");
$collection = $client->demo->beers;

$result = $collection->find();
foreach ($result as $entry) {
    echo $entry['_id'], ': ', $entry['name'], "\n";
}
?>
