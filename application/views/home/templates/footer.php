<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url('assets/js/sa.js') ?>"></script>
<script>
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
</script>

</body>

</html>