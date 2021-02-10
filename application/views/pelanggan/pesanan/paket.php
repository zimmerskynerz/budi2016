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
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Wisata</th>
                                        <th style="text-align: center;">Destinasi</th>
                                        <th style="text-align: center;">Lama</th>
                                        <th style="text-align: center;">Keterangan Paket</th>
                                        <th style="text-align: center;">Normal</th>
                                        <th style="text-align: center;">Penawaran</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pesanan_paket as $Data_pesanan_paket) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_pesanan_paket->nm_paket ?></td>
                                            <td><?= $Data_pesanan_paket->destination ?></td>
                                            <td><?= $Data_pesanan_paket->jml_hari ?> Hari</td>
                                            <td>
                                                Fasilitas : <?= $Data_pesanan_paket->ket_paket ?>
                                            </td>
                                            <td>Rp <?= $Data_pesanan_paket->hg_standard ?>,-</td>
                                            <td>Rp <?= $Data_pesanan_paket->harga_paket ?>,-</td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($Data_pesanan_paket->status_paket == 'PROSES') : ?>
                                                    Validasi Harga
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'KONFIRMASI_TOLAK') : ?>
                                                    <a id="proses_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#ulang_proses" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-hg_standard="<?= $Data_pesanan_paket->hg_standard ?>" data-harga_paket="<?= $Data_pesanan_paket->harga_paket ?>" data-hg_minim="<?= $Data_pesanan_paket->hg_minim ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'KONFIRMASI_DP') : ?>
                                                    <a id="paket_proses" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#proses_paket" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-id_paket="<?= $Data_pesanan_paket->id_paket ?>" data-nm_paket="<?= $Data_pesanan_paket->nm_paket ?>" data-ket_paket="<?= $Data_pesanan_paket->ket_paket ?>" data-hg_modal="<?= $Data_pesanan_paket->hg_modal ?>" data-hg_standard="<?= $Data_pesanan_paket->hg_standard ?>" data-hg_minim="<?= $Data_pesanan_paket->hg_minim ?>" data-harga_paket="<?= $Data_pesanan_paket->harga_paket ?>" data-destination="<?= $Data_pesanan_paket->destination ?>" data-jml_hari="<?= $Data_pesanan_paket->jml_hari ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'DP') : ?>
                                                    <a id="paket_proses_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#proses_paket_ulang" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-tgl_dp="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_dp)) ?>" data-bukti_dp="<?= $Data_pesanan_paket->bukti_dp ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'TOLAK_DP') : ?>
                                                    <a id="paket_proses_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#proses_paket_ulang" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-tgl_dp="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_dp)) ?>" data-bukti_dp="<?= $Data_pesanan_paket->bukti_dp ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'TERIMA_DP') : ?>
                                                    <a id="paket_proses_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#lunas_paket" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-tgl_dp="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_dp)) ?>" data-bukti_dp="<?= $Data_pesanan_paket->bukti_dp ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'LUNAS') : ?>
                                                    <a id="paket_lunas_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#lunas_paket_ulang" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-tgl_dp="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_dp)) ?>" data-tgl_lunas="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_lunas)) ?>" data-bukti_dp="<?= $Data_pesanan_paket->bukti_dp ?>" data-bukti_lunas="<?= $Data_pesanan_paket->bukti_lunas ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'GAGAL_LUNAS') : ?>
                                                    <a id="paket_lunas_ulang" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#lunas_paket_ulang" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Data_pesanan_paket->no_pesanan ?>" data-tgl_dp="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_dp)) ?>" data-tgl_lunas="<?= date('d F Y', strtotime($Data_pesanan_paket->tgl_lunas)) ?>" data-bukti_dp="<?= $Data_pesanan_paket->bukti_dp ?>" data-bukti_lunas="<?= $Data_pesanan_paket->bukti_lunas ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Data_pesanan_paket->status_paket == 'KONFIRMASI') : ?>
                                                    SIAP BERANGKAT
                                                <?php endif;
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
<!-- Mengulangi Penawaran -->
<div class="modal fade" id="ulang_proses" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Penawaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/pesanan/crudpesanan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Standard</label>
                    <input type="number" readonly id="hg_standard" name="hg_standard" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                    <input type="number" hidden id="hg_minim" name="hg_minim" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Penawaran Sebelumnya</label>
                    <input type="number" readonly id="harga_paket" name="harga_paket" readonly name="example-email" class="form-control" placeholder="Harga Penawaran Sebelumnya">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Penawaran Baru</label>
                    <input type="number" id="penawaran_baru" name="penawaran_baru" name="example-email" class="form-control" placeholder="Harga Penawaran Baru">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="batal_proses" name="batal_proses" class="btn btn-primary">Batal</button>
                <button type="submit" id="kirim_ulang_proses" name="kirim_ulang_proses" class="btn btn-primary">Kirim Ulang</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Upload DP -->
<div class="modal fade" id="proses_paket" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Upload Bukti DP</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/pesanan/crudpesanan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Bukti Transfer DP</label>
                    <input type="file" id="bukti_dp" name="bukti_dp" required name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="bukti_dp" name="bukti_dp">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="kirim_bukti_paket_dp" name="kirim_bukti_paket_dp" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Upload Ulang DP -->
<div class="modal fade" id="proses_paket_ulang" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Upload Bukti DP</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/pesanan/crudpesanan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Upload DP</label>
                    <input type="text" readonly id="tgl_dp" name="tgl_dp" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                    <input type="text" hidden id="bukti_dp_lama" name="bukti_dp_lama" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Bukti Transfer DP</label>
                    <input type="file" id="bukti_dp" name="bukti_dp" required name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="bukti_dp_view" name="bukti_dp_view">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="kirim_bukti_paket_dp_ulang" name="kirim_bukti_paket_dp_ulang" class="btn btn-primary">Kirim Ulang</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Upload Lunas -->
<div class="modal fade" id="lunas_paket" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Upload Bukti LUNAS</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/pesanan/crudpesanan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Upload DP</label>
                    <input type="text" readonly id="tgl_dp" name="tgl_dp" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                    <input type="text" hidden id="bukti_dp_lama" name="bukti_dp_lama" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Bukti Transfer LUNAS</label>
                    <input type="file" id="bukti_dp" name="bukti_dp" required name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <label for="example-email">Bukti Transfer DP</label>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="bukti_dp_view" name="bukti_dp_view">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="kirim_bukti_paket_lunas" name="kirim_bukti_paket_lunas" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- upload Ulang Lunas -->
<div class="modal fade" id="lunas_paket_ulang" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Upload Pesanan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/pesanan/crudpesanan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Rental</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                    <input type="text" id="bukti_lunas_lama" hidden name="bukti_lunas_lama" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Bukti Transfer Lunas</label>
                    <input type="file" id="bukti_dp" name="bukti_dp" required name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tranfer DP</label>
                    <input type="text" readonly id="tgl_dp" name="tgl_dp" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="bukti_dp_view" name="bukti_dp_view">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tranfer Lunas</label>
                    <input type="text" readonly id="tgl_lunas" name="tgl_lunas" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="bukti_lunas_view" name="bukti_lunas_view">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="kirim_bukti_paket_lunas_ulang" name="kirim_bukti_paket_lunas_ulang" class="btn btn-danger">Kirim Ulang</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#proses_ulang", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var hg_standard = $(this).data('hg_standard');
        var hg_minim = $(this).data('hg_minim');
        var harga_paket = $(this).data('harga_paket');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #hg_standard").val(hg_standard);
        $(".modal-body#detail_body #hg_minim").val(hg_minim);
        $(".modal-body#detail_body #harga_paket").val(harga_paket);
    });
    $(document).on("click", "#paket_proses", function() {
        var no_pesanan = $(this).data('no_pesanan');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
    });
    $(document).on("click", "#paket_proses_ulang", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var tgl_dp = $(this).data('tgl_dp');
        var bukti_dp = $(this).data('bukti_dp');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #tgl_dp").val(tgl_dp);
        $(".modal-body#detail_body #bukti_dp_lama").val(bukti_dp);
        $(".modal-body#detail_body #bukti_dp_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_dp);
        $(".modal-body#detail_body #bukti_lunas_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_lunas);
    });
    $(document).on("click", "#rental_detail_dp", function() {
        var no_rental = $(this).data('no_rental');
        var tgl_dp = $(this).data('tgl_dp');
        var bukti_dp = $(this).data('bukti_dp');
        $(".modal-body#detail_body #no_rental").val(no_rental);
        $(".modal-body#detail_body #tgl_dp").val(tgl_dp);
        $(".modal-body#detail_body #bukti_dp_lama").val(bukti_dp);
        $(".modal-body#detail_body #bukti_dp_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_dp);
    });
    $(document).on("click", "#paket_lunas_ulang", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var tgl_dp = $(this).data('tgl_dp');
        var tgl_lunas = $(this).data('tgl_lunas');
        var bukti_dp = $(this).data('bukti_dp');
        var bukti_lunas = $(this).data('bukti_lunas');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #tgl_dp").val(tgl_dp);
        $(".modal-body#detail_body #tgl_lunas").val(tgl_lunas);
        $(".modal-body#detail_body #bukti_lunas_lama").val(bukti_lunas);
        $(".modal-body#detail_body #bukti_dp_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_dp);
        $(".modal-body#detail_body #bukti_lunas_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_lunas);
    });
    setTimeout(function() {
        $('#pesan_berhasil').hide()
    }, 3000);
    setTimeout(function() {
        $('#pesan_gagal').hide()
    }, 3000);
</script>