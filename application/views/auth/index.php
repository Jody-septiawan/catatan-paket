<!doctype html>
<html lang="en">

<head>
    <title>Login - Catatan Paket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/gif" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        body {
            background-image: url(<?= base_url('assets/img/bg2.svg')  ?>);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <form action="<?= base_url('auth/login_proses') ?>" method="POST">
                            <div class="text-center">
                                <img src="<?= base_url('assets/img/logo.png') ?>" class="img-fluid" width="50px" alt="">
                            </div>
                            <div class="h5 text-center mb-4">Catatan Paket</div>
                            <?=
                            $this->session->flashdata('message');
                            ?>
                            <div class="form-group">
                                <input required type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <input required type="password" placeholder="password" name="password" id="input-new-password" class="form-control" aria-describedby="basic-addon2">
                                <div class="input-group-append pointer" onclick="changeInputNewPasswordType()">
                                    <span class="input-group-text" id="basic-addon">
                                        <i class="fas fa-eye-slash" id="icon-eye-slash"></i>
                                        <i class="fas fa-eye d-none" id="icon-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" name="" id="" class="btn btn-primary btn-sm btn-block mt-4">Login</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function changeInputNewPasswordType() {
            let inputPasswordType = document.getElementById("input-new-password").getAttribute('type');
            if (inputPasswordType == 'text') {
                document.getElementById("input-new-password").setAttribute('type', 'password');
                $('#icon-eye').toggleClass('d-none');
                $('#icon-eye-slash').toggleClass('d-none');
            } else {
                document.getElementById("input-new-password").setAttribute('type', 'text');
                $('#icon-eye-slash').toggleClass('d-none');
                $('#icon-eye').toggleClass('d-none');
            }
        }
    </script>
</body>

</html>