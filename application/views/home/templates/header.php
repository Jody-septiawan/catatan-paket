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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

        function showRupiahPembayaran(nominal, id) {
            let rupiah = toRupiah(nominal);
            document.getElementById("nominalPembayaran" + id).innerHTML = rupiah;
            // console.log(rupiah);
            // console.log("nominalPembayaran" + id);
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
            <div class="collapse navbar-collapse text-right" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <?php if ($title == '- Dashboard') : ?>
                        <li class="nav-item active">
                            <?php if ($data) : ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modelId">Tambah</button>
                            <?php endif; ?>
                        </li>
                    <?php else : ?>
                        <li class="nav-item active">
                            <a href="<?= base_url('/') ?>" class="btn btn-sm btn-info">All Paket</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item active">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm mt-2 mt-md-0 ml-md-2 btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akun Saya
                            </button>
                            <div class="dropdown-menu dropdown-menu-right shadow">
                                <small class="dropdown-header mb-0 py-0 px-3" style="font-size: 10px;">Username</small>
                                <h5 class="dropdown-item py-0 px-3" style="font-size: 18px;"><?= $user['username'] ?></h5>
                                <hr class="my-1">
                                <small class="dropdown-header mb-0 py-0 px-3" style="font-size: 10px;">Edit User</small>
                                <button class="dropdown-item py-0 px-3" type="button" data-toggle="modal" data-target="#updateUsername">Username</button>
                                <button class="dropdown-item py-0 px-3" type="button" data-toggle="modal" data-target="#updatePassword">Password</button>
                                <hr class="my-1">
                                <a href="<?= base_url('auth/logout') ?>" class=" dropdown-item px-3" type="button">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Username -->
    <div class="modal fade" id="updateUsername" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Username</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/updateUsername') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" value="<?= $user['id'] ?>" name="id">
                        <div class="form-group">
                            <label for="" class="text-muted">Username saat ini</label>
                            <input readonly type="text" class="form-control" value="<?= $user['username'] ?>" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group mb-0">
                            <label for="">Masukkan username baru disini</label>
                            <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer py-2">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Password -->
    <div class="modal fade bg-dark" id="updatePassword" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/updatePassword') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" value="<?= $user['id'] ?>" name="id">
                        <label for="" class="text-muted">New Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="input-new-password" oninput="checkInputNewPassword(this.value)" class="form-control" aria-describedby="basic-addon2">
                            <div class="input-group-append pointer" onclick="changeInputNewPasswordType()">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-eye-slash" id="icon-eye-slash"></i>
                                    <i class="fas fa-eye d-none" id="icon-eye"></i>
                                </span>
                            </div>
                        </div>
                        <span class="d-none" id="confirmPassword">
                            <label for="" class="text-muted">Confirm new password</label>
                            <div class="input-group mb-3">
                                <input type="password" id="input-new-password2" oninput="checkPassword()" class="form-control" aria-describedby="basic-addon2">
                                <div class="input-group-append pointer" onclick="changeInputNewPassword2Type()">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="fas fa-eye-slash" id="icon-eye-slash2"></i>
                                        <i class="fas fa-eye d-none" id="icon-eye2"></i>
                                    </span>
                                </div>
                            </div>
                        </span>
                        <span id="alert-password"></span>
                    </div>
                    <div class="modal-footer py-2">
                        <button type="submit" id="btn-update-password" class="btn btn-sm btn-primary" disabled>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>