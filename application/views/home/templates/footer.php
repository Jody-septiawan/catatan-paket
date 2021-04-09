<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url('assets/js/sa.js') ?>"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    let btnFormTambah = document.getElementById("btn-form-tambah");

    let tagNamaPaket = false;
    let tagNilaiPaket = false;

    let inputNamaPaket = document.getElementById("inputNamaPaket");
    let inputNilaiPaket = document.getElementById("inputNilaiPaket");

    function handleNamaPaket(val) {
        if (val) {
            tagNamaPaket = true;
        } else {
            tagNamaPaket = false;
        }
        checkInput();
    }

    function handleNilaiPaket(val) {
        if (val) {
            tagNilaiPaket = true;
        } else {
            tagNilaiPaket = false;
        }
        checkInput();
    }

    checkInput();

    function checkInput() {
        if (tagNamaPaket && tagNilaiPaket) {
            btnFormTambah.removeAttribute("disabled", "");
        } else {
            btnFormTambah.setAttribute("disabled", "");
        }
    }

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

    function changeInputNewPassword2Type() {
        let inputPasswordType = document.getElementById("input-new-password2").getAttribute('type');
        if (inputPasswordType == 'text') {
            document.getElementById("input-new-password2").setAttribute('type', 'password');
            $('#icon-eye2').toggleClass('d-none');
            $('#icon-eye-slash2').toggleClass('d-none');
        } else {
            document.getElementById("input-new-password2").setAttribute('type', 'text');
            $('#icon-eye-slash2').toggleClass('d-none');
            $('#icon-eye2').toggleClass('d-none');
        }
    }

    function checkPassword() {
        let pw1 = document.getElementById("input-new-password").value;
        let pw2 = document.getElementById("input-new-password2").value;

        if (pw1) {
            if (pw1 != pw2) {
                document.getElementById("alert-password").innerHTML = '<span class="text-danger">Password tidak sama</span>';
                document.getElementById("btn-update-password").setAttribute('disabled', 'true')
            } else {
                document.getElementById("alert-password").innerHTML = '<span class="text-success">Password sama <i class="fas fa-check text-success"></i></span>';
                document.getElementById("btn-update-password").removeAttribute('disabled');
            }

            if (!pw2) {
                document.getElementById("alert-password").innerHTML = null;
            }
        }
    }

    function checkInputNewPassword(val) {
        if (val) {
            $('#confirmPassword').removeClass('d-none');
        } else {
            $('#confirmPassword').addClass('d-none');
        }
    }
</script>
</body>

</html>