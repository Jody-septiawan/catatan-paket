<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <?=
            $this->session->flashdata('message');
            ?>
        </div>
        <?php foreach ($data as $d) : ?>
            <div class="col-lg-3 c mt-4">
                <a href="<?= base_url('home/detailPaket/') . $d['id']  ?>" class="link-card-paket">
                    <div class="card card-click">
                        <div class="card-body py-2">
                            <small class="text-muted"><?= $d['createAt'] ?></small>
                            <div><?= $d['nama'] ?></div>
                            <div class="mt-2">
                                Rp. <span id="nominalPaket<?= $d['id'] ?>"></span>
                                <script>
                                    showRupiah(<?= $d['nilai'] ?>, <?= $d['id'] ?>);
                                </script>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('home/addpaket') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Tambah Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Paket</label>
                        <input type="text" class="form-control" oninput="handleNilaiPaket(this.value)" name="nama" id="inputNamaPaket" aria-describedby="helpId" placeholder="">
                    </div>
                    <label for="">Nilai Paket</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" class="form-control" oninput="handleNamaPaket(this.value)" name="nilai" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" id="btn-form-tambah" class="btn btn-sm btn-primary">Tambah</button>
                </div>
        </form>
    </div>
</div>