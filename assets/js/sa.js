$('.btn-delete-material').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        text: "Hapus Material ?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

$('.btn-delete-tukang').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        text: "Hapus Upah Tukang ?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

$('.btn-delete-lain').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        text: "Hapus Biaya lain-lain ?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

$('.btn-delete-pembayaran').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const nama = $(this).attr('name');

    Swal.fire({
        text: `Hapus paket ${nama} ?`,
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

$('.btn-delete-paket').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const nama = $(this).attr('name');

    Swal.fire({
        text: `Hapus paket ${nama} ?`,
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});