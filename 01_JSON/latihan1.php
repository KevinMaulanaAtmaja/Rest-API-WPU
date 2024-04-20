<?php
// merubah dari array assosiatif ke json
$siswa = [
    [
        "nama" => "kevin",
        "umur" => 17,
        "lulus" => true
    ],
    [
        "nama" => "amel",
        "umur" => 5,
        "lulus" => false
    ]
];
$data = json_encode($siswa);

echo $data;
