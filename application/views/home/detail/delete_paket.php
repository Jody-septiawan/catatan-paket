<div class="container mt-3 pb-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body py-1">
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-1">Paket <?= $data['nama'] ?></div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= base_url('home/deletePaket/') . $data['id'] ?>" class="btn btn-sm btn-danger py-1 btn-delete-paket" name="<?= $data['nama'] ?>">Hapus Paket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>