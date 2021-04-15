<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-2 mb-3 shadow">
                <div class="card-header py-2">
                    <div class="row">
                        <div class="col-6 px-1">
                            <div class="h5 mb-0 mt-1">Pembayaran</div>
                        </div>
                        <div class="col-6 px-1 text-right">
                            <?php if ($sisa_pembayaran != 0) : ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addPembayaran">Tambah</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <?=
                    $this->session->flashdata('message2');
                    ?>
                    <?php if ($pembayaran) : ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th width="1%" class="text-center">Ke</th>
                                        <th width="40%">Nominal</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pembayaran as $m) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td>
                                                Rp. <span id="nominalPembayaran<?= $m['id'] ?>"></span>
                                                <script>
                                                    showRupiahPembayaran(<?= $m['harga'] ?>, <?= $m['id'] ?>);
                                                </script>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info py-0 px-1" data-toggle="modal" data-target="#updatePembayaran<?= $m['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <a name="pembayaran" href="<?= base_url('home/deletePembayaran/') . $m['id'] . '/' . $data['id'] ?>" class="btn btn-sm btn-danger py-0 px-1 btn-delete-pembayaran"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                    <tr>
                                        <th class="text-right">Total</th>
                                        <td>Rp. <span id="nominalPembayaran0"></span>
                                            <script>
                                                showRupiahPembayaran(<?= $Total_pembayaran ?>, 0);
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if ($sisa_pembayaran != 0) : ?>
                                <table class="table table-sm table-bordered mb-0 mt-2">
                                    <tr>
                                        <th width="9.5%" class="text-center">Sisa</th>
                                        <td width="90.5%">Rp. <span id="nominalPembayaran9999999999"></span>
                                            <script>
                                                showRupiahPembayaran(<?= $sisa_pembayaran ?>, 9999999999);
                                            </script>
                                        </td>
                                    </tr>
                                </table>
                            <?php else : ?>
                                <div class="mt-3">Status :
                                    <span class="mt-2 text-success">Lunas <i class="fas fa-check"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="text-center"><i>Tidak ada catatan pembayaran</i></div>
                    <?php endif; ?>
                </div>
            </div>
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
                                        <th width="40%">Nominal</th>
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
                                        <th width="40%">Nominal</th>
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
                                                Rp. <span id="nominalTukang<?= $m['id'] ?>"></span>
                                                <script>
                                                    showRupiahTukang(<?= $m['harga'] ?>, <?= $m['id'] ?>);
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
            <div class="card mt-2 mb-3 shadow">
                <div class="card-header py-2">
                    <div class="row">
                        <div class="col-6 px-1">
                            <div class="h5 mb-0 mt-1">Biaya lain-lain</div>
                        </div>
                        <div class="col-6 px-1 text-right">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLain">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <?=
                    $this->session->flashdata('message4');
                    ?>
                    <?php if ($lain) : ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="39%">Nama</th>
                                        <th width="40%">Nominal</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($lain as $m) : ?>
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
                                                <button class="btn btn-sm btn-info py-0 px-1" data-toggle="modal" data-target="#updateLain<?= $m['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <a href="<?= base_url('home/deleteLain/') . $m['id'] . '/' . $data['id'] ?>" class="btn btn-sm btn-danger py-0 px-1 btn-delete-lain"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                    <tr>
                                        <th colspan="2" class="text-right">Total</th>
                                        <td>Rp. <span id="nominalLain0"></span>
                                            <script>
                                                showRupiahLain(<?= $Total_lain ?>, 0);
                                            </script>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="text-center"><i>Tidak ada catatan biaya lain-lain</i></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Material -->
<div class="modal fade" id="addMaterial" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                        <label for="">Nominal</label>
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

<!-- Modal Pembayaran -->
<div class="modal fade" id="addPembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addPembayaran') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <label for="">Nominal
                        <?php if (!$pembayaran) : ?>
                            (Uang Muka)
                        <?php endif; ?>
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" max="<?= $sisa_pembayaran ?>" class="form-control" name="harga" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 1;
foreach ($pembayaran as $m) : ?>
    <div class="modal fade" id="updatePembayaran<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Update Pembayaran ke - <?= $no ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/updatePembayaran') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $m['id'] ?>">
                    <input type="hidden" name="id_paket" value="<?= $data['id'] ?>">
                    <div class="modal-body">
                        <label for="">Nominal</label>
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
<?php $no++;
endforeach; ?>