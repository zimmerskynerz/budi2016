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
                            <h1 class="card-title">Data Kendaraan</h1>
                        </div>
                        <!-- /.card-header -->
                        <button type="button" class="btn btn-secondary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#tambah_kendaraan">Tambah</button>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>No Registrasi</th>
                                        <th>Keterangan</th>
                                        <th>Stnk</th>
                                        <th>Penumpang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_kendaraan as $Data_kendaraan) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/foto_kendaraan/' . $Data_kendaraan->foto_kendaraan . '') ?>" width="50%">
                                            </td>
                                            <td><?= $Data_kendaraan->no_registrasi  ?></td>
                                            <td>
                                                Merk : <?= $Data_kendaraan->merk ?>;<br>
                                                Type : <?= $Data_kendaraan->type ?>;<br>
                                                Jenis : <?= $Data_kendaraan->jenis ?>;<br>
                                                Warna : <?= $Data_kendaraan->warna ?>;<br>
                                                Tahun : <?= $Data_kendaraan->th_pembuatan ?>;
                                            </td>
                                            <td><?= date('d F Y', strtotime($Data_kendaraan->berlaku_stnk)) ?></td>
                                            <td><?= $Data_kendaraan->jml_penumpang  ?> Orang</td>
                                            <td style="text-align: center;">
                                                <a id="kendaraan_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_kendaraan" data-placement="top" title="" data-original-title="Detail" data-no_registrasi="<?= $Data_kendaraan->no_registrasi ?>" data-merk="<?= $Data_kendaraan->merk ?>" data-type="<?= $Data_kendaraan->type ?>" data-jenis="<?= $Data_kendaraan->jenis ?>" data-th_pembuatan="<?= $Data_kendaraan->th_pembuatan ?>" data-warna="<?= $Data_kendaraan->warna ?>" data-berlaku_stnk="<?= $Data_kendaraan->berlaku_stnk ?>" data-jml_penumpang="<?= $Data_kendaraan->jml_penumpang ?>" data-foto_kendaraan="<?= $Data_kendaraan->foto_kendaraan ?>">
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
<!-- Menu Modal Sopir -->
<div class="modal fade" id="tambah_kendaraan" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Kendaraan Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/rental/crudkendaraan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <label for="">No Registrasi</label>
                <div class="row gx-5">
                    <div class="col">
                        <div class="form-group mb-2">
                            <input type="text" id="area" name="area" name="example-email" class="form-control" placeholder="K">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <input type="number" id="nomor" name="nomor" name="example-email" class="form-control" placeholder="4711">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <input type="text" id="registrasi" name="registrasi" name="example-email" class="form-control" placeholder="ORG">
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="merk">Merk</label>
                            <input type="text" id="merk" name="merk" name="example-email" class="form-control" placeholder="Merk Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type">Type</label>
                            <input type="text" id="type_kendaraan" name="type_kendaraan" name="example-email" class="form-control" placeholder="Type Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="jenis">Jenis</label>
                            <input type="text" id="jenis" name="jenis" name="example-email" class="form-control" placeholder="Jenis Kendaraan">
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="merk">Warna</label>
                            <input type="text" id="warna" name="warna" name="example-email" class="form-control" placeholder="Warna Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type">Tahun Pembuatan</label>
                            <input type="number" id="th_pembuatan" name="th_pembuatan" name="example-email" class="form-control" placeholder="Tahun Pembuatan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="jenis">Berlaku STNK</label>
                            <input type="text" id="berlaku_stnk" name="berlaku_stnk" name="example-email" class="form-control" placeholder="Berlaku STNK">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Jumlah Penumpang</label>
                    <input type="number" id="jml_penumpang" name="jml_penumpang" name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">Foto Kendaraan</label>
                    <input type="file" id="foto_kendaraan" name="foto_kendaraan" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                    <small>Foto Format Jpeg, Jpg, Png</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_kendaraan" name="simpan_kendaraan">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="detail_sopir" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Detail Sopir</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/rental/crudkendaraan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <label for="">No Registrasi</label>
                <div class="form-group mb-3">
                    <label for="example-email">Jumlah Penumpang</label>
                    <input type="text" readonly id="no_registrasi" name="no_registrasi" name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="row gx-5">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="merk">Merk</label>
                            <input type="text" id="merk" name="merk" name="example-email" class="form-control" placeholder="Merk Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type">Type</label>
                            <input type="text" id="type_kendaraan" name="type_kendaraan" name="example-email" class="form-control" placeholder="Type Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="jenis">Jenis</label>
                            <input type="text" id="jenis" name="jenis" name="example-email" class="form-control" placeholder="Jenis Kendaraan">
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="merk">Warna</label>
                            <input type="text" id="warna" name="warna" name="example-email" class="form-control" placeholder="Warna Kendaraan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type">Tahun Pembuatan</label>
                            <input type="number" id="th_pembuatan" name="th_pembuatan" name="example-email" class="form-control" placeholder="Tahun Pembuatan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="jenis">Berlaku STNK</label>
                            <input type="text" id="berlaku_stnk" name="berlaku_stnk" name="example-email" class="form-control" placeholder="Berlaku STNK">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Jumlah Penumpang</label>
                    <input type="number" id="jml_penumpang" name="jml_penumpang" name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">Foto Kendaraan</label>
                    <input type="file" id="foto_kendaraan" name="foto_kendaraan" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                    <small>Foto Format Jpeg, Jpg, Png</small>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group">
                            <img src="" width="100%" id="sim" name="foto_kendaraan_view">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="hapus_kendaraan" name="hapus_kendaraan" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_kendaraan" name="ubah_kendaraan" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#sopir_detail", function() {
        var no_registrasi = $(this).data('no_registrasi');
        var type_kendaraan = $(this).data('type_kendaraan');
        var merk = $(this).data('merk');
        var jenis = $(this).data('jenis');
        var th_pembuatan = $(this).data('th_pembuatan');
        var warna = $(this).data('warna');
        var berlaku_stnk = $(this).data('berlaku_stnk');
        var jml_penumpang = $(this).data('jml_penumpang');
        var foto_kendaraan = $(this).data('foto_kendaraan');
        $(".modal-body#detail_body #no_registrasi").val(no_registrasi);
        $(".modal-body#detail_body #type_kendaraan").val(type_kendaraan);
        $(".modal-body#detail_body #jenis").val(jenis);
        $(".modal-body#detail_body #merk").val(merk);
        $(".modal-body#detail_body #th_pembuatan").val(th_pembuatan);
        $(".modal-body#detail_body #warna").val(warna);
        $(".modal-body#detail_body #berlaku_stnk").val(berlaku_stnk);
        $(".modal-body#detail_body #jml_penumpang").val(jml_penumpang);
        $(".modal-body#detail_body #foto").attr("src", "<?= base_url('assets/berkas/') ?>" + foto);
        $(".modal-body#detail_body #foto_kendaraan_view").attr("src", "<?= base_url('assets/foto_kendaraan/') ?>" + foto_kendaraan);
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