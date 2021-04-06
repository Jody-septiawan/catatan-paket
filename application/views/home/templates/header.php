<!doctype html>
<html lang="en">

<head>
    <title>Catatan Paket <?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script>
        function showRupiah(nominal, id) {
            let rupiah = toRupiah(nominal);
            document.getElementById("nominalPaket" + id).innerHTML = rupiah;
        }

        function showRupiahMaterial(nominal, id) {
            let rupiah = toRupiah(nominal);
            document.getElementById("nominalMaterial" + id).innerHTML = rupiah;
        }

        function showRupiahTukang(nominal, id) {
            let rupiah = toRupiah(nominal);
            document.getElementById("nominalTukang" + id).innerHTML = rupiah;
        }

        function showRupiahLain(nominal, id) {
            let rupiah = toRupiah(nominal);
            document.getElementById("nominalLain" + id).innerHTML = rupiah;
        }

        function toRupiah(nominal) {
            let bilangan = nominal;

            let number_string = bilangan.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('') ?>">
                <img src="<?= base_url('assets/img/logo.png') ?>" class="img-logo-navbar" alt="">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <?php if ($title == '- Dashboard') : ?>
                        <li class="nav-item active">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modelId">Tambah</button>
                        </li>
                    <?php else : ?>
                        <li class="nav-item active">
                            <a href="<?= base_url('/') ?>" class="btn btn-sm btn-info">All Paket</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item active">
                        <a class="btn btn-sm btn-secondary ml-2" href="<?= base_url('auth/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>