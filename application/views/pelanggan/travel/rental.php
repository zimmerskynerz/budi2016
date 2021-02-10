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
                            <h1 class="card-title">Paket Rental</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">No Registrasi</th>
                                        <th style="text-align: center;">Foto</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Sopir</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_rental as $Data_rental) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_rental->no_registrasi ?></td>
                                            <td style="text-align: center;" width="350px">
                                                <img src="<?= base_url('assets/foto_kendaraan/' . $Data_rental->foto_kendaraan . '') ?>" width="50%">
                                            </td>
                                            <td>
                                                Merk : <?= $Data_rental->merk ?>;<br>
                                                Type : <?= $Data_rental->type ?>;<br>
                                                Jenis : <?= $Data_rental->jenis ?>;<br>
                                                Warna : <?= $Data_rental->warna ?>;<br>
                                                Tahun : <?= $Data_rental->th_pembuatan ?>;<br>
                                                Penumpang : <?= $Data_rental->jml_penumpang ?> Orang;
                                            </td>
                                            <td><?= $Data_rental->nm_sopir ?></td>
                                            <td>Rp <?= $Data_rental->harga ?>,- /Hari</td>
                                            <?php
                                            if ($Data_rental->status_sopir == 'BERANGKAT') :
                                            # code...
                                            else : ?>
                                                <td style="text-align: center;">
                                                    <a id="rental_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_rental" data-placement="top" title="" data-original-title="Detail" data-id_rental="<?= $Data_rental->id_rental ?>" data-id_sopir="<?= $Data_rental->id_sopir ?>" data-no_registrasi="<?= $Data_rental->no_registrasi ?>" data-harga="<?= $Data_rental->harga ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            <?php endif;
                                            ?>

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
<div class="modal fade" id="detail_rental" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Rental</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('pelanggan/travel/crudtravel'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Berangkat</label>
                    <input type="date" min="<?= date('Y-m-d') ?>" id="tgl_berangkat" name="tgl_berangkat" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Selesai</label>
                    <input type="date" id="tgl_selesai" min="<?= date('Y-m-d') ?>" name="tgl_selesai" name="example-email" class="form-control" onchange="hitung_hari()">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Sewa Per Hari</label>
                    <input type="text" id="id_rental" hidden name="id_rental" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                    <input type="text" id="id_pelanggan" value="<?= $identitas['id_pelanggan'] ?>" hidden name="id_pelanggan" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                    <input type="number" id="harga" readonly name="harga" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Jumlah Hari</label>
                    <input type="text" id="jml_hari" readonly name="jml_hari" name="example-email" class="form-control" placeholder="Masukkan Jumlah Hari">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Total Harga Sewa</label>
                    <input type="number" id="ttl_harga" readonly name="ttl_harga" name="example-email" class="form-control" placeholder="Total Harga Rental">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="sewa_rental" name="sewa_rental" class="btn btn-danger">Sewa</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#rental_detail", function() {
        var id_rental = $(this).data('id_rental');
        var harga = $(this).data('harga');
        $(".modal-body#detail_body #id_rental").val(id_rental);
        $(".modal-body#detail_body #harga").val(harga);
    })
</script>
<script>
    function hitung_hari() {
        var tgl_1 = new Date($("#tgl_berangkat").val());
        var tgl_2 = new Date($("#tgl_selesai").val());
        var hari = 24 * 60 * 60 * 1000;
        var jml_hari = Math.round(Math.round((tgl_2.getTime() - tgl_1.getTime()) / hari));
        if (jml_hari == 0) {
            var jml_hari_fix = 1;
        } else {
            var jml_hari_fix = jml_hari;
        }
        $(".modal-body#detail_body #jml_hari").val(jml_hari_fix);
        var harga = $("#harga").val();
        var jml_bayar = jml_hari_fix * harga;
        $(".modal-body#detail_body #ttl_harga").val(jml_bayar);
    }
</script>
<script>
    setTimeout(function() {
        $('#pesan_gagal').hide()
    }, 3000);
</script>