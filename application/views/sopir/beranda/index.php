<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('pesan_berhasil'); ?>
                    <?= $this->session->flashdata('pesan_gagal'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Data Rental Kendaraan</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Kode Pesanan</th>
                                        <th style="text-align: center;">No Registrasi</th>
                                        <th style="text-align: center;">Berangkat</th>
                                        <th style="text-align: center;">Pulang</th>
                                        <th style="text-align: center;">Hari</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pesanan_rental as $Data_pesanan_rental) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_pesanan_rental->no_rental ?></td>
                                            <td><?= $Data_pesanan_rental->no_registrasi ?></td>
                                            <td><?= date('d F Y', strtotime($Data_pesanan_rental->tgl_berangkat)) ?></td>
                                            <td><?= date('d F Y', strtotime($Data_pesanan_rental->tgl_selesai)) ?></td>
                                            <td><?= $Data_pesanan_rental->jml_hari ?> Hari</td>
                                            <td style="text-align: center;">
                                                <?php if ($Data_pesanan_rental->status_rental == 'KONFIRMASI') : ?>
                                                    <a id="konfirmasi_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_konfirmasi" data-placement="top" title="" data-original-title="Detail" data-no_rental="<?= $Data_pesanan_rental->no_rental ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_rental->status_rental == 'BERANGKAT') : ?>
                                                    <a id="konfirmasi_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_konfirmasi_selesai" data-placement="top" title="" data-original-title="Detail" data-no_rental="<?= $Data_pesanan_rental->no_rental ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_rental->status_rental == 'SELESAI') : ?>
                                                    SELESAI
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Data Paket Wisata</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Pesanan</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Paket</th>
                                        <th style="text-align: center;">Berangkat</th>
                                        <th style="text-align: center;">Pulang</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pesanan_paket as $Pesanan_paket) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Pesanan_paket->no_pesanan ?></td>
                                            <td><?= $Pesanan_paket->nm_pelanggan ?></td>
                                            <td><?= $Pesanan_paket->nm_paket ?></td>
                                            <td><?= date('d F Y', strtotime($Pesanan_paket->tgl_berangkat)) ?></td>
                                            <td><?= date('d F Y', strtotime($Pesanan_paket->tgl_selesai)) ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($Pesanan_paket->status_paket == 'KONFIRMASI') : ?>
                                                    <a id="konfirmasi_detail_paket" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#paket_detail_konfirmasi" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Pesanan_paket->status_paket == 'BERANGKAT') : ?>
                                                    <a id="konfirmasi_detail_paket" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#paket_detail_konfirmasi_selesai" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Pesanan_paket->status_paket == 'SELESAI') : ?>
                                                    SELESAI
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Kelola Rental -->
<div class="modal fade" id="detail_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Konfirmasi Pemberangkatan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('sopir/crudkonfirmasi'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Rental</label>
                    <input type="text" readonly id="no_rental" name="no_rental" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="sopir_berangkat_rental" name="sopir_berangkat_rental" class="btn btn-primary">Berangkat</button>
                <!-- <button type="submit" id="sopir_konfirmasi" name="sopir_konfirmasi" class="btn btn-success">Konfirmasi</button> -->
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="detail_konfirmasi_selesai" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Konfirmasi Selesai</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('sopir/crudkonfirmasi'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Rental</label>
                    <input type="text" readonly id="no_rental" name="no_rental" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="sopir_selesai_rental" name="sopir_selesai_rental" class="btn btn-primary">Selesai</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Kelola Paket -->
<div class="modal fade" id="paket_detail_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Konfirmasi Pemberangkatan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('sopir/crudkonfirmasi'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="sopir_berangkat_paket" name="sopir_berangkat_paket" class="btn btn-primary">Berangkat</button>
                <!-- <button type="submit" id="sopir_konfirmasi_paket" name="sopir_konfirmasi_paket" class="btn btn-success">Konfirmasi</button> -->
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="paket_detail_konfirmasi_selesai" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Konfirmasi Selesai</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('sopir/crudkonfirmasi'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="sopir_selesai_paket" name="sopir_selesai_paket" class="btn btn-primary">Selesai</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#konfirmasi_detail", function() {
        var no_rental = $(this).data('no_rental');
        $(".modal-body#detail_body #no_rental").val(no_rental);
    })
    $(document).on("click", "#konfirmasi_detail_paket", function() {
        var no_pesanan = $(this).data('no_pesanan');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
    })
</script>
<script>
    setTimeout(function() {
        $('#pesan_berhasil').hide()
    }, 3000);
    setTimeout(function() {
        $('#pesan_gagal').hide()
    }, 3000);
</script>