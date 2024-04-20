<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

// profile Yt
$key = "{KEY}";
$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCIg-2u0bICI4JmUiZpr5NSw&key=' . $key);

$ytProfile = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$ytName = $result['items'][0]['snippet']['title'];
$ytSubs = $result['items'][0]['statistics']['subscriberCount'];

// latest vid
$latestVid = get_CURL('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCIg-2u0bICI4JmUiZpr5NSw&maxResults=1&order=date&key=' . $key);
$vidId = $latestVid['items'][0]['id']['videoId'];
// var_dump($vidId)


// Ig
$clientId = "{clientId}";
$accessToken = "{accessToken}";
$longAccessToken = "{longAccessToken}";
$userId = "{userId}";
$secretApp = "{secretApp}";

$url = "https://graph.instagram.com/me?fields=id,username,media_count,account_type&access_token=" . $longAccessToken;
$result = get_CURL($url);
// var_dump($result);
$usernameIg = $result['username'];
// $pictureIg = $result[''];
$jumlahPost = $result['media_count'];
$tipeAkun = $result['account_type'];


$url = "https://graph.instagram.com/".$userId."/media?fields=media_url&access_token=" . $longAccessToken;
$result = get_CURL($url);
$photos = [];
foreach ($result['data'] as $foto) {
    $photos[] = $foto['media_url'];
    // var_dump($foto);
}


// mendapat token
// ada di text-token



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Google & Facebook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">API Google & Facebook</h1>
    <section class="social" id="social">
        <div class="container">


            <div class="row justify-content-center mt-5">
                <!-- yt -->
                <div class="col-md-5">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <img src="<?= $ytProfile; ?>" alt="" class="rounded-circle img-fluid" width="400">
                        </div>
                        <div class="col-md-8">
                            <h4><?= $ytName; ?></h4>
                            <p><?= $ytSubs; ?> Subscriber</p>
                            <div class="g-ytsubscribe" data-channelid="UCIg-2u0bICI4JmUiZpr5NSw" data-count="default">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/<?= $vidId; ?>" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ig -->
                <div class="col-md-5">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <img src="chino.jpg" alt="" class="rounded-circle img-fluid" width="400">
                        </div>
                        <div class="col-md-8">
                            <h3>Username: <?= $usernameIg; ?></h3>
                            <h4>Tipe Akun: <?= $tipeAkun; ?></h4>
                            <p>Total Posting Akun: <?= $jumlahPost; ?></p>
                        </div>


                    </div>
                    <div class="row">
                        <?php foreach ($photos as $foto) : ?>
                            <div class="col-md-4 mb-2">
                                <a href="<?= $foto; ?>"><img src="<?= $foto; ?>" alt="" class="img-thumbnail" width="150">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>