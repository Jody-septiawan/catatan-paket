<!-- Modal Material -->
<div class="modal fade" id="addTukang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah Upah Tukang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addTukang') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" aria-describedby="helpId" placeholder="">
                    </div>
                    <label for="">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" class="form-control" name="harga" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($tukang as $m) : ?>
    <div class="modal fade" id="updateTukang<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Tukang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/updateTukang') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $m['id'] ?>">
                    <input type="hidden" name="id_paket" value="<?= $data['id'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" value="<?= $m['nama'] ?>" name="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <label for="">Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                            </div>
                            <input type="number" class="form-control" value="<?= $m['harga'] ?>" name="harga" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="modal-footer py-2">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>