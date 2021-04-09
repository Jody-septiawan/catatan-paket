<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- <?=
                    $this->session->flashdata('message');
                    ?> -->
        </div>
        <div class="col-12 mt-3">
            <div class="card shadow mt-2 mb-3">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-striped table-hover mb-0">
                                    <tr>
                                        <th width="20%">Tanggal</th>
                                        <td width="80%"><?= $data['createAt'] ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Nama Paket</th>
                                        <td width="80%"><?= $data['nama'] ?> <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateNama"></i></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Nilai</th>
                                        <td width="80%"> Rp.
                                            <span id="nominalPaket<?= $data['id'] ?>"></span> <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateNilai"></i>
                                            <script>
                                                showRupiah(<?= $data['nilai'] ?>, <?= $data['id'] ?>);
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">UM-Termin</th>
                                        <td width="80%">
                                            <?php if (!$data['um_termin']) : ?>
                                                <button class="btn btn-sm btn-primary py-0 px-1" data-toggle="modal" data-target="#addUM">Tambah</button>
                                            <?php else : ?>
                                                Rp.
                                                <span id="nominalPaket<?= $data['id'] + 1 ?>"></span>
                                                <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateUM"></i>
                                                <script>
                                                    showRupiah(<?= $data['um_termin'] ?>, <?= $data['id'] + 1 ?>);
                                                </script>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">PPN - PPH</th>
                                        <td width="80%">
                                            <?php if (!$data['ppn_pph']) : ?>
                                                <button class="btn btn-sm btn-primary py-0 px-1" data-toggle="modal" data-target="#addPPN">Tambah</button>
                                            <?php else : ?>
                                                <?= $data['ppn_pph'] ?> % <span class="text-muted">= Rp.
                                                    <span id="nominalPaket<?= $data['id'] + 7 ?>"></span>
                                                </span>
                                                <script>
                                                    showRupiah(<?= $nominal_ppn ?>, <?= $data['id'] + 7 ?>);
                                                </script>
                                                <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updatePPN"></i>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Fee</th>
                                        <td width="80%">
                                            <?php if (!$data['fee']) : ?>
                                                <button class="btn btn-sm btn-primary py-0 px-1" data-toggle="modal" data-target="#addFEE">Tambah</button>
                                            <?php else : ?>
                                                Rp.
                                                <span id="nominalPaket<?= $data['id'] + 2 ?>"></span>
                                                <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateFEE"></i>
                                                <script>
                                                    showRupiah(<?= $data['fee'] ?>, <?= $data['id'] + 2 ?>);
                                                </script>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Pengeluaran</th>
                                        <td width="80%">
                                            Rp.
                                            <span id="nominalPaket<?= $data['id'] + 9 ?>"></span>
                                            <script>
                                                showRupiah(<?= $pengeluaran ?>, <?= $data['id'] + 9 ?>);
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Profit</th>
                                        <td width="80%"> Rp.
                                            <span id="nominalPaket<?= $data['id'] + 8 ?>"></span>
                                            <script>
                                                showRupiah(<?= $profit ?>, <?= $data['id'] + 8 ?>);
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Ket</th>
                                        <td width="80%">
                                            <?php if ($data['ket']) : ?>
                                                <?= $data['ket'] ?> <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateKeterangan"></i>
                                            <?php else : ?>
                                                - <i class="fas fa-pen-alt text-update pointer ml-2" data-toggle="modal" data-target="#updateKeterangan"></i>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nama Paket -->
<div class="modal fade" id="updateNama" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update Nama Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/updateNama') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input required type="text" class="form-control" value="<?= $data['nama'] ?>" name="nama" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Nilai Paket -->
<div class="modal fade" id="updateNilai" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update Nilai Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/updateNilai') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input required type="number" class="form-control" value="<?= $data['nilai'] ?>" name="nilai" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Keterangan -->
<div class="modal fade" id="updateKeterangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/updateKet') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" name="ket" id="" rows="3"><?= $data['ket'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal UM -->
<div class="modal fade" id="addUM" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah UM-Termin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addUM') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" class="form-control" name="um-termin" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateUM" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update UM-Termin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addUM') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" value="<?= $data['um_termin'] ?>" class="form-control" name="um-termin" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal PPN -->
<div class="modal fade" id="addPPN" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah PPN-PPH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addPPN') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ppn" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <small class="text-muted">
                        <span class="text-danger">*</span> Gunakan tanda titik <b>.</b> sebagai pengganti koma
                    </small>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updatePPN" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update PPN-PPH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addPPN') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?= $data['ppn_pph'] ?>" name="ppn" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <small class="text-muted">
                        <span class="text-danger">*</span> Gunakan tanda titik <b>.</b> sebagai pengganti koma
                    </small>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal FEE -->
<div class="modal fade" id="addFEE" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Tambah Fee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addFEE') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" class="form-control" name="fee" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateFEE" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title">Update Fee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/addFEE') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" value="<?= $data['fee'] ?>" class="form-control" name="fee" id="inputNilaiPaket" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>