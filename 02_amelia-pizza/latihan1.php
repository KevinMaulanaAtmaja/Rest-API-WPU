<?php
$data = file_get_contents('data/pizza.json');
$menu  = json_decode($data, true);

$menu = $menu["menu"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Amelia Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info bg-opacity-50">
        <div class="container">
            <a class="navbar-brand" href="#">Amelia Pizza</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#">All Menu</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>All Menu</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($menu as $m) : ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="img/menu/<?= $m["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $m["nama"]; ?></h5>
                            <p class="card-text"><?= $m["deskripsi"]; ?></p>
                            <h5 class="card-title">Rp. <?= number_format($m["harga"], 0, ',', '.'); ?></h5>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>