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
                            <h1 class="card-title">Data Pesanan Paket</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pesanan</th>
                                        <th>Nama</th>
                                        <th>Paket</th>
                                        <th>Berangkat</th>
                                        <th>Pulang</th>
                                        <th>Standard</th>
                                        <th>Minimal</th>
                                        <th>Penawaran</th>
                                        <th>Aksi</th>
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
                                            <td>Rp <?= $Pesanan_paket->hg_standard ?>,-</td>
                                            <td>Rp <?= $Pesanan_paket->hg_minim ?>,-</td>
                                            <td>Rp <?= $Pesanan_paket->harga_paket ?>,-</td>
                                            <td style="text-align: center;">
                                                <?php if ($Pesanan_paket->status_paket == 'PROSES') : ?>
                                                    <a id="proses_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_proses" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Pesanan_paket->status_paket == 'KONFIRMASI_TOLAK') : ?>
                                                    PENAWARAN DITOLAK
                                                <?php elseif ($Pesanan_paket->status_paket == 'KONFIRMASI_DP') : ?>
                                                    MENUNGGU DP
                                                <?php elseif ($Pesanan_paket->status_paket == 'DP') : ?>
                                                    <a id="paket_detail_dp" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_paket_dp" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>" data-bukti_dp="<?= $Pesanan_paket->bukti_dp ?>" data-tgl_dp="<?= date('d F Y', strtotime($Pesanan_paket->tgl_dp)) ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Pesanan_paket->status_paket == 'TERIMA_DP') : ?>
                                                    DP DITERIMA
                                                <?php elseif ($Pesanan_paket->status_paket == 'TOLAK_DP') : ?>
                                                    DP TOLAK
                                                <?php elseif ($Pesanan_paket->status_paket == 'LUNAS') : ?>
                                                    <a id="rental_detail_lunas" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_rental_lunas" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>" data-bukti_dp="<?= $Pesanan_paket->bukti_dp ?>" data-bukti_lunas="<?= $Pesanan_paket->bukti_lunas ?>" data-tgl_dp="<?= date('d F Y', strtotime($Pesanan_paket->tgl_dp)) ?>" data-tgl_lunas="<?= date('d F Y', strtotime($Pesanan_paket->tgl_lunas)) ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php elseif ($Pesanan_paket->status_paket == 'KONFIRMASI') : ?>
                                                    SIAP BERANGKAT
                                                <?php elseif ($Pesanan_paket->status_paket == 'GAGAL_LUNAS') : ?>
                                                    BUKTI DI TOLAK
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
<!-- Kelola Penawaran -->
<div class="modal fade" id="detail_proses" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Pesanan Paket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/pesanan/crudpaket'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="tolak_penawaran" name="tolak_penawaran" class="btn btn-danger">Tolak</button>
                <button type="submit" id="terima_penawaran" name="terima_penawaran" class="btn btn-primary">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Kelola DP -->
<div class="modal fade" id="detail_paket_dp" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Pesanan Paket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/pesanan/crudpaket'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="tolak_paket_dp" name="tolak_paket_dp" class="btn btn-danger">Tolak</button>
                <button type="submit" id="terima_paket_dp" name="terima_paket_dp" class="btn btn-primary">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="detail_rental_lunas" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Pesanan Paket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/pesanan/crudpaket'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
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
                <button type="submit" id="tolak_paket_lunas" name="tolak_paket_lunas" class="btn btn-danger">Tolak</button>
                <button type="submit" id="terima_paket_lunas" name="terima_paket_lunas" class="btn btn-primary">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#paket_detail_dp", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var tgl_dp = $(this).data('tgl_dp');
        var bukti_dp = $(this).data('bukti_dp');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #tgl_dp").val(tgl_dp);
        $(".modal-body#detail_body #bukti_dp_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_dp);
    })
</script>
<script type="text/javascript">
    $(document).on("click", "#proses_detail", function() {
        var no_pesanan = $(this).data('no_pesanan');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
    })
    $(document).on("click", "#rental_detail_lunas", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var tgl_dp = $(this).data('tgl_dp');
        var tgl_lunas = $(this).data('tgl_lunas');
        var bukti_dp = $(this).data('bukti_dp');
        var bukti_lunas = $(this).data('bukti_lunas');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #tgl_dp").val(tgl_dp);
        $(".modal-body#detail_body #tgl_lunas").val(tgl_lunas);
        $(".modal-body#detail_body #bukti_dp_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_dp);
        $(".modal-body#detail_body #bukti_lunas_view").attr("src", "<?= base_url('assets/bukti_tranfer/') ?>" + bukti_lunas);
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