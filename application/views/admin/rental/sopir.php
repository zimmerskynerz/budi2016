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
                            <h1 class="card-title">Data Sopir</h1>
                        </div>
                        <!-- /.card-header -->
                        <button type="button" class="btn btn-secondary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#tambah_sopir">Tambah</button>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">No HP</th>
                                        <th style="text-align: center;">Alamat</th>
                                        <th style="text-align: center;">Gabung</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_sopir as $Data_sopir) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_sopir->nm_sopir ?></td>
                                            <td><?= $Data_sopir->email ?></td>
                                            <td><?= $Data_sopir->no_hp ?></td>
                                            <td><?= $Data_sopir->alamat ?></td>
                                            <td><?= date('d F Y', strtotime($Data_sopir->tgl_gabung)) ?></td>
                                            <td style="text-align: center;">
                                                <a id="sopir_detail" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#detail_sopir" data-placement="top" title="" data-original-title="Detail" data-email="<?= $Data_sopir->email ?>" data-id_login="<?= $Data_sopir->id_login ?>" data-nm_sopir="<?= $Data_sopir->nm_sopir ?>" data-no_hp="<?= $Data_sopir->no_hp ?>" data-sim="<?= $Data_sopir->sim ?>" data-foto="<?= $Data_sopir->foto ?>" data-alamat="<?= $Data_sopir->alamat ?>">
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
<div class="modal fade" id="tambah_sopir" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Tambah Sopir Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/rental/crudsopir'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Email</label>
                    <input type="email" id="email" name="email" name="example-email" class="form-control" placeholder="Masukkan Email Pengurus">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Nama Sopir</label>
                    <input type="text" id="nm_sopir" name="nm_sopir" name="example-email" class="form-control" placeholder="Masukkan Nama Pengurus">
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">No HP/WA</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                    <small>Foto Format Jpeg, Jpg, Png</small>
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">Surat Izin Mengemudi</label>
                    <input type="file" id="sim" name="sim" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                    <small>Foto Sim Yang Masih Berlaku Format Jpeg, Jpg, Png</small>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap Pengurus" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="simpan_sopir" name="simpan_sopir">Simpan</button>
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
                <?php echo form_open_multipart('admin/rental/crudsopir'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">Email</label>
                    <input type="email" id="email" readonly name="email" name="example-email" class="form-control" placeholder="Masukkan Email Pengurus">
                    <input type="text" id="id_login" hidden name="id_login" name="example-email" class="form-control" placeholder="Masukkan Email Pengurus">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Nama Sopir</label>
                    <input type="text" id="nm_sopir" name="nm_sopir" name="example-email" class="form-control" placeholder="Masukkan Nama Pengurus">
                </div>
                <div class="form-group mb-3">
                    <label for="no_hp">No HP/WA</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan Nomer HP atau Nomer WA">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap Pengurus" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Foto Profile</label>
                        <div class="input-group">
                            <img src="" width="100%" id="foto" name="foto">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Surat Izin Mengemudi</label>
                        <div class="input-group">
                            <img src="" width="100%" id="sim" name="sim">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="reset_password" name="reset_password" class="btn btn-warning">Reset</button>
                <button type="submit" id="hapus_sopir" name="hapus_sopir" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_sopir" name="ubah_sopir" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#sopir_detail", function() {
        var id_login = $(this).data('id_login');
        var email = $(this).data('email');
        var nm_sopir = $(this).data('nm_sopir');
        var no_hp = $(this).data('no_hp');
        var alamat = $(this).data('alamat');
        var foto = $(this).data('foto');
        var sim = $(this).data('sim');
        $(".modal-body#detail_body #id_login").val(id_login);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #no_hp").val(no_hp);
        $(".modal-body#detail_body #nm_sopir").val(nm_sopir);
        $(".modal-body#detail_body #alamat").val(alamat);
        $(".modal-body#detail_body #foto").attr("src", "<?= base_url('assets/berkas/') ?>" + foto);
        $(".modal-body#detail_body #sim").attr("src", "<?= base_url('assets/berkas/') ?>" + sim);
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