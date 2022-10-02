
<?php
require 'pegawai.php';


$daftarPegawai = [
    
    [
        'nip' => 2019114021,
        'nama' => 'Agus Nurmantyo',
        'jabatan' => 'Manager',
        'agama' => 'Islam',
        'status' => 'Belum Menikah'
    ],
    [
        'nip' => 2019114022,
        'nama' => 'Bambang Sutejo',
        'jabatan' => 'Asmen',
        'agama' => 'Islam',
        'status' => 'Menikah'
    ],
    [
        'nip' => 2019114023,
        'nama' => 'Chaca Kharisma',
        'jabatan' => 'Staff',
        'agama' => 'Islam',
        'status' => 'Belum Menikah'
    ],
    [
        'nip' => 2019114024,
        'nama' => 'Dylan Darmian',
        'jabatan' => 'Kabag',
        'agama' => 'Islam',
        'status' => 'Menikah'
    ],
    [
        'nip' => 2019114025,
        'nama' => 'Endah Susanti',
        'jabatan' => 'Staff',
        'agama' => 'Islam',
        'status' => 'Menikah'
    ],
]

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid col-lg-12 bg-light p-4">
        <h1 class="text-center fs-2 mb-0 my-3"><?= Pegawai::PT ?></h1>
        <p class="text-center fs-4 mb-5">DATA PEGAWAI</p>

        <div class="row">
            <?php
            // Perulangan
            foreach ($daftarPegawai as $dpegawai) {
                $pegawai = new Pegawai($dpegawai['nip'], $dpegawai['nama'], $dpegawai['jabatan'], $dpegawai['agama'], $dpegawai['status']);
                $pegawai->cetak();
            }
            ?>
        </div><br>
        <h6 class="text-left p-1 mt-0 my-0 col-lg-3">JUMLAH PEGAWAI: <?= Pegawai::$no ?></h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>