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
                            <h1 class="card-title">Paket Wisata</h1>
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
                                        <th style="text-align: center;">Penumpang</th>
                                        <th style="text-align: center;">Keterangan Paket</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_paket as $Data_paket) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_paket->nm_paket ?></td>
                                            <td><?= $Data_paket->destination ?></td>
                                            <td><?= $Data_paket->jml_hari ?> Hari</td>
                                            <td><?= $Data_paket->jml_penumpang ?> Orang</td>
                                            <td>
                                                Fasilitas : <?= $Data_paket->ket_paket ?>
                                            </td>
                                            <td>Rp <?= $Data_paket->hg_standard ?>,-</td>
                                            <td style="text-align: center;">
                                                <a id="paket_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_paket" data-placement="top" title="" data-original-title="Detail" data-id_paket="<?= $Data_paket->id_paket ?>" data-nm_paket="<?= $Data_paket->nm_paket ?>" data-ket_paket="<?= $Data_paket->ket_paket ?>" data-hg_modal="<?= $Data_paket->hg_modal ?>" data-hg_standard="<?= $Data_paket->hg_standard ?>" data-hg_minim="<?= $Data_paket->hg_minim ?>" data-destination="<?= $Data_paket->destination ?>" data-jml_hari="<?= $Data_paket->jml_hari ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
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
<div class="modal fade" id="detail_paket" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
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
                    <label for="example-email">Nama Paket Wisata</label>
                    <input readonly type="text" id="nm_paket" name="nm_paket" name="example-email" class="form-control" required placeholder="Masukkan Nama Paket Wisata">
                    <input readonly type="text" id="id_paket" hidden name="id_paket" name="example-email" class="form-control" required placeholder="Masukkan Nama Paket Wisata">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tujuan Wisata</label>
                    <input readonly type="text" id="destination" name="destination" name="example-email" class="form-control" required placeholder="Masukkan Tujuan WIsata">
                    <input readonly type="text" hidden value="<?= $identitas['id_pelanggan'] ?>" id="id_pelanggan" name="id_pelanggan" name="example-email" class="form-control" required placeholder="Masukkan Tujuan WIsata">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Lama Liburan</label>
                    <input readonly type="number" id="jml_hari" name="jml_hari" name="example-email" class="form-control" required placeholder="Masukkan Jumlah Hari Liburan">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Keterangan Paket Wisata</label>
                    <textarea readonly class="form-control" id="ket_paket" name="ket_paket" required placeholder="Keterangan Paket Wisata" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Normal</label>
                    <input readonly type="number" id="hg_standard" name="hg_standard" name="example-email" class="form-control" required placeholder="Masukkan Harga Standard">
                    <input hidden type="number" id="hg_minim" name="hg_minim" name="example-email" class="form-control" required placeholder="Masukkan Harga Standard">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Tanggal Liburan</label>
                    <input type="date" min="<?= date('Y-m-d') ?>" id="tgl_berangkat" name="tgl_berangkat" name="example-email" class="form-control" required placeholder="Masukkan Jumlah Hari Liburan">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Penawaran Harga</label>
                    <input type="number" id="tawar_harga" name="tawar_harga" name="example-email" class="form-control" placeholder="Masukkan Harga Terendah">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="pilih_paket" name="pilih_paket" class="btn btn-primary">Pilih</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#paket_detail", function() {
        var id_paket = $(this).data('id_paket');
        var nm_paket = $(this).data('nm_paket');
        var destination = $(this).data('destination');
        var ket_paket = $(this).data('ket_paket');
        var hg_modal = $(this).data('hg_modal');
        var hg_standard = $(this).data('hg_standard');
        var hg_minim = $(this).data('hg_minim');
        var jml_hari = $(this).data('jml_hari');
        $(".modal-body#detail_body #id_paket").val(id_paket);
        $(".modal-body#detail_body #nm_paket").val(nm_paket);
        $(".modal-body#detail_body #ket_paket").val(ket_paket);
        $(".modal-body#detail_body #destination").val(destination);
        $(".modal-body#detail_body #hg_modal").val(hg_modal);
        $(".modal-body#detail_body #hg_standard").val(hg_standard);
        $(".modal-body#detail_body #hg_minim").val(hg_minim);
        $(".modal-body#detail_body #jml_hari").val(jml_hari);
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