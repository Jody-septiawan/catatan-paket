<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-2 mb-3 shadow">
                <div class="card-header py-2">
                    <div class="row">
                        <div class="col-6 px-1">
                            <div class="h5 mb-0 mt-1">Material</div>
                        </div>
                        <div class="col-6 px-1 text-right">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMaterial">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <?=
                    $this->session->flashdata('message2');
                    ?>
                    <?php if ($material) : ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="39%">Nama</th>
                                        <th width="40%">Harga</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($material as $m) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= $m['nama'] ?></td>
                                            <td>
                                                Rp. <span id="nominalMaterial<?= $m['id'] ?>"></span>
                                                <script>
                                                    showRupiahMaterial(<?= $m['harga'] ?>, <?= $m['id'] ?>);
                                                </script>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info py-0 px-1" data-toggle="modal" data-target="#updateMaterial<?= $m['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <a href="<?= base_url('home/deleteMaterial/') . $m['id'] . '/' . $data['id'] ?>" class="btn btn-sm btn-danger py-0 px-1 btn-delete-material"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                    <tr>
                                        <th colspan="2" class="text-right">Total</th>
                                        <td>Rp. <span id="nominalMaterial0"></span>
                                            <script>
                                                showRupiahMaterial(<?= $Total_material ?>, 0);
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="text-center"><i>Tidak ada catatan material</i></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-2 mb-3 shadow">
                <div class="card-header py-2">
                    <div class="row">
                        <div class="col-6 px-1">
                            <div class="h5 mb-0 mt-1">Upah Tukang</div>
                        </div>
                        <div class="col-6 px-1 text-right">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addTukang">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <?=
                    $this->session->flashdata('message3');
                    ?>
                    <?php if ($tukang) : ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="39%">Nama</th>
                                        <th width="40%">Harga</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tukang as $m) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= $m['nama'] ?></td>
                                            <td>
                                                Rp. <span id="nominalMaterial<?= $m['id'] ?>"></span>
                                                <script>
                                                    showRupiahMaterial(<?= $m['harga'] ?>, <?= $m['id'] ?>);
                                                </script>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info py-0 px-1" data-toggle="modal" data-target="#updateTukang<?= $m['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <a href="<?= base_url('home/deleteTukang/') . $m['id'] . '/' . $data['id'] ?>" class="btn btn-sm btn-danger py-0 px-1 btn-delete-tukang"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                    <tr>
                                        <th colspan="2" class="text-right">Total</th>
                                        <td>Rp. <span id="nominalTukang0"></span>
                                            <script>
                                                showRupiahTukang(<?= $Total_tukang ?>, 0);
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="text-center"><i>Tidak ada catatan upah tukang</i></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Material -->
<div class="modal fade" id="addMaterial" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addMaterial') ?>" method="post">
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

<?php foreach ($material as $m) : ?>
    <div class="modal fade" id="updateMaterial<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/updateMaterial') ?>" method="post">
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