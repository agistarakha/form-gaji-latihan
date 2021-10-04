<?php
$total = 0;
$id = $_POST["id"];
$nama = $_POST["nama"];
$jabatan = $_POST["jabatan"];

$biaya_jabatan = 0;
$jam_lembur = $_POST["jam-lembur"];
$bonus_lembur = $jam_lembur * 20000;

$tunjangan_tetap = 1000000;
$tunjangan_kehadiran = 30000 * $_POST['kehadiran'];
$tunjagan_total = $tunjangan_tetap + $tunjangan_kehadiran;

$bpjs = 260000;


$lain_lain = 100000;
switch ($jabatan) {
    case 'Product Manager':
        $gaji = 4000000;
        break;
    case 'Producer':
        $gaji = 5000000;
        break;
    case 'Lead Programmer':
        $gaji = 3500000;
        break;
    case 'QA':
        $gaji = 2500000;
        break;
}

$biaya_jabatan = $gaji * (5 / 100);
$total_penambahan = $bonus_lembur + $tunjagan_total;
$total_pengurangan = $biaya_jabatan + $lain_lain + $bpjs;
$total = $gaji + $total_penambahan - $total_pengurangan;

$penambahan_arr = array(
    "Gaji Pokok" => $gaji,
    "Tunjangan Tetap" => $tunjangan_tetap,
    "Tunjangan Kehadiran" => $tunjangan_kehadiran,
    "Bonus Lembur" => $bonus_lembur,
);

$pengurangan_arr = array(
    "BPJS" => $bpjs,
    "Biaya Jabatan" => $biaya_jabatan,
    "Lain-lain" => $lain_lain

)



?>

<!DOCTYPE html>

<html lang="en">

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <title>Hasil</title>
    </head>
</head>

<body>
    <div class="container p-4">

        <h2 class="text-center">Perhitungan Gaji</h2>

        <h4>Nama : <?= $nama ?></h4>
        <h4>ID: <?= $id ?></h4>
        <h3>Total Penambahan</h3>
        <table style="padding: 10px;" border="1">
            <tr>
                <th class="border border-dark">Keterangan</th>
                <th class="border border-dark">Jumlah</th>
            </tr> <?php foreach ($penambahan_arr as $keterangan => $jml) { ?>
                <tr>
                    <td class="border border-dark">
                        <?= $keterangan ?>
                    </td>
                    <td class="border border-dark">
                        Rp.<?= $jml ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td class="border border-dark">
                    <b>Total: </b>
                </td>
                <td class="border border-dark">
                    <b><?= $total_penambahan ?></b>
                </td>
            </tr>
        </table>


        <h3>Total Pengurangan</h3>
        <table class="border border-dark" style="padding: 10px;">
            <tr>
                <th class="border border-dark">Keterangan</th>
                <th class="border border-dark">Jumlah</th>
            </tr>
            <?php foreach ($pengurangan_arr as $keterangan => $jml) { ?>
                <tr>
                    <td class="border border-dark">
                        <?= $keterangan ?>
                    </td>
                    <td class="border border-dark">
                        Rp.<?= $jml ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td class="border border-dark">
                    <b>Total: </b>
                </td>
                <td class="border border-dark">
                    <b><?= $total_pengurangan ?></b>
                </td>
            </tr>
        </table>

        <h3>Gaji Bersih</h3>
        <table style="padding: 10px;" border="1">
            <tr>
                <th class="border border-dark">Keterangan</th>
                <th class="border border-dark">Jumlah</th>
            </tr>
            <tr>
                <td class="border border-dark">
                    "Total Penambahan"
                </td>
                <td class="border border-dark">
                    + Rp. <?= $total_penambahan ?>
                </td>
            </tr>
            <tr>
                <td class="border border-dark">
                    "Total Pengurangan"
                </td>
                <td class="border border-dark">
                    - Rp. <?= $total_pengurangan ?>
                </td>
            </tr>
            <tr>
                <td class="border border-dark">
                    <b>Gaji Bersih: </b>
                </td>
                <td class="border border-dark">
                    <b><?= $total ?></b>
                </td>
            </tr>
        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>