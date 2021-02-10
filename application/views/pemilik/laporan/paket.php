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
                            <h1 class="card-title">Data Paket Wisata</h1>
                        </div>
                        <!-- /.card-header -->
                        <button type="button" class="btn btn-secondary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#lihat_laporan">Laporan</button>
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
                                        <th style="text-align: center;">Harga</th>
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
                                            <td>Rp <?= $Pesanan_paket->harga_paket ?>,-</td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Pesanan_paket->status_paket == 'KONFIRMASI') :
                                                    echo 'Siap Berangkat';
                                                elseif ($Pesanan_paket->status_paket == 'BERANGKAT') :
                                                    echo 'Berangkat';
                                                elseif ($Pesanan_paket->status_paket == 'SELESAI') :
                                                    echo 'Selesai';
                                                endif;
                                                ?>
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
                <?php echo form_open_multipart('pemilik/laporan/paket'); ?>
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