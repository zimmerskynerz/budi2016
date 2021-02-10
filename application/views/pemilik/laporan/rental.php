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
                        <button type="button" class="btn btn-secondary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#lihat_laporan">Laporan</button>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>No Registrasi</th>
                                        <th>Berangkat</th>
                                        <th>Pulang</th>
                                        <th>Hari</th>
                                        <th>Harga</th>
                                        <th>Status</th>
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
                                            <td>Rp <?= $Data_pesanan_rental->harga_total ?>,-</td>
                                            <td>
                                                <?php if ($Data_pesanan_rental->status_rental == 'KONFIRMASI') :
                                                    echo 'Siap Berangkat';
                                                elseif ($Data_pesanan_rental->status_rental == 'BERANGKAT') :
                                                    echo 'Berangkat';
                                                elseif ($Data_pesanan_rental->status_rental == 'SELESAI') :
                                                    echo 'Selesai';
                                                endif; ?>
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
<!-- Kelola Sopir -->
<div class="modal fade" id="lihat_laporan" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Lihat Laporan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('pemilik/laporan/rental'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Tanggal Mulai</label>
                    <input type="date" id="tgl_awal" name="tgl_awal" name="example-email" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Tanggal Akhir</label>
                    <input type="date" id="tgl_akhir" name="tgl_akhir" name="example-email" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="lihat_laporan" name="lihat_laporan">Lihat</button>
                <button type="submit" class="btn btn-primary" id="cetak_laporan" name="cetak_laporan">Cetak</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>