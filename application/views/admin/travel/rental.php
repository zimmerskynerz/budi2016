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
                            <h1 class="card-title">Data Paket Rental</h1>
                        </div>
                        <!-- /.card-header -->
                        <button type="button" class="btn btn-secondary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#tambah_rental">Tambah</button>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">No Registrasi</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Sopir</th>
                                        <th style="text-align: center;">Status</th>
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
                                            <td>
                                                Merk : <?= $Data_rental->merk ?>;<br>
                                                Type : <?= $Data_rental->type ?>;<br>
                                                Jenis : <?= $Data_rental->jenis ?>;<br>
                                                Warna : <?= $Data_rental->warna ?>;<br>
                                                Tahun : <?= $Data_rental->th_pembuatan ?>;
                                            </td>
                                            <td><?= $Data_rental->nm_sopir ?></td>
                                            <td><?= $Data_rental->status_sopir ?></td>
                                            <td><?= $Data_rental->harga ?></td>
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
<!-- Menu Modal Sopir -->
<div class="modal fade" id="tambah_rental" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Rental Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/travel/crudrental'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Sopir</label>
                    <select name="id_sopir" id="id_sopir" class="form-control">
                        <option value="">Pilih Sopir</option>
                        <?php foreach ($data_sopir as $Data_sopir) : ?>
                            <option value="<?= $Data_sopir->id_sopir ?>"><?= $Data_sopir->nm_sopir ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Mobil</label>
                    <select name="no_registrasi" id="no_registrasi" class="form-control">
                        <option value="">Pilih Mobil</option>
                        <?php foreach ($data_kendaraan as $Data_kendaraan) : ?>
                            <option value="<?= $Data_kendaraan->no_registrasi ?>"><?= $Data_kendaraan->no_registrasi ?> - <?= $Data_kendaraan->merk ?> - <?= $Data_kendaraan->type ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Sewa</label>
                    <input type="number" id="harga" name="harga" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                    <small>Harga sewa dihitung per hari</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_rental" name="simpan_rental">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
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
                <?php echo form_open_multipart('admin/travel/crudrental'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Sopir</label>
                    <select name="id_sopir" id="id_sopir" class="form-control">
                        <option value="">Pilih Sopir</option>
                        <?php foreach ($data_sopir as $Data_sopir) : ?>
                            <option value="<?= $Data_sopir->id_sopir ?>"><?= $Data_sopir->nm_sopir ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Mobil</label>
                    <select name="no_registrasi" id="no_registrasi" class="form-control">
                        <option value="">Pilih Mobil</option>
                        <?php foreach ($data_kendaraan as $Data_kendaraan) : ?>
                            <option value="<?= $Data_kendaraan->no_registrasi ?>"><?= $Data_kendaraan->no_registrasi ?> - <?= $Data_kendaraan->merk ?> - <?= $Data_kendaraan->type ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Harga Sewa</label>
                    <input type="text" id="id_rental" hidden name="id_rental" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                    <input type="number" id="harga" name="harga" name="example-email" class="form-control" placeholder="Masukkan Harga Sewa">
                    <small>Harga sewa dihitung per hari</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="hapus_rental" name="hapus_rental" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_rental" name="ubah_rental" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#rental_detail", function() {
        var id_rental = $(this).data('id_rental');
        var id_sopir = $(this).data('id_sopir');
        var no_registrasi = $(this).data('no_registrasi');
        var harga = $(this).data('harga');
        $(".modal-body#detail_body #id_rental").val(id_rental);
        $(".modal-body#detail_body #id_sopir").val(id_sopir);
        $(".modal-body#detail_body #harga").val(harga);
        $(".modal-body#detail_body #no_registrasi").val(no_registrasi);
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