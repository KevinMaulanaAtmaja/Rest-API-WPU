<?php
require 'vendor/autoload.php';


use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
    'query' => [
        'apikey' => '{API_KEY}',
        's' => 'Eromanga'
    ]
]);

// var_dump($response->getBody()->getContents());
$result = json_decode($response->getBody()->getContents(), true);

var_dump($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guzzle Rest Client</title>
</head>

<body>
    <?php foreach ($result['Search'] as $movie) : ?>
        <ul>
            <li>Title: <?= $movie['Title']; ?></li>
            <li>Year: <?= $movie['Year']; ?></li>
            <li>
                <img src="<?= $movie['Poster']; ?>" alt="<?= $movie['Title']; ?>">
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>