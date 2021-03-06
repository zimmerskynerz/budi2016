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
                                        <th style="text-align: center;">Harga</th>
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
                                        <th style="text-align: center;">Standard</th>
                                        <th style="text-align: center;">Minimal</th>
                                        <th style="text-align: center;">Penawaran</th>
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
                                            <td>Rp <?= $Pesanan_paket->hg_standard ?>,-</td>
                                            <td>Rp <?= $Pesanan_paket->hg_minim ?>,-</td>
                                            <td>Rp <?= $Pesanan_paket->harga_paket ?>,-</td>
                                            <td style="text-align: center;">
                                                <?php if ($Pesanan_paket->id_rental == null) : ?>
                                                    <a id="pilih_sopir" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#sopir_pilih" data-placement="top" title="" data-original-title="Detail" data-no_pesanan="<?= $Pesanan_paket->no_pesanan ?>" data-jml_penumpang="<?= $Pesanan_paket->jml_penumpang ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php
                                                else :
                                                    if ($Pesanan_paket->status_paket == 'KONFIRMASI') :
                                                        echo 'Siap Berangkat';
                                                    elseif ($Pesanan_paket->status_paket == 'BERANGKAT') :
                                                        echo 'Berangkat';
                                                    elseif ($Pesanan_paket->status_paket == 'SELESAI') :
                                                        echo 'Selesai';
                                                    endif;
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
<!-- Pilih Sopir -->
<div class="modal fade" id="sopir_pilih" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="scrollableModalTitle">Pilih Sopir Paket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/jadwal/crudjadwal'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group mb-3">
                    <label for="example-email">No Pesanan</label>
                    <input type="text" readonly id="no_pesanan" name="no_pesanan" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Jumlah Penumpang</label>
                    <input type="text" readonly id="jml_penumpang" name="jml_penumpang" readonly name="example-email" class="form-control" placeholder="Jumlah Penumpang">
                </div>
                <div class="form-group mb-3">
                    <label for="example-email">Pilih Sopir dan Mobil</label>
                    <select name="id_rental" id="id_rental" class="form-control">
                        <?php foreach ($data_rental as $Data_rental) : ?>
                            <option value="<?= $Data_rental->id_rental ?>">No Registri : <?= $Data_rental->no_registrasi ?>; Penumpang : <?= $Data_rental->jml_penumpang ?> Orang; Sopir : <?= $Data_rental->nm_sopir ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan_sopir" name="simpan_sopir" class="btn btn-danger">Jadwal</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).on("click", "#pilih_sopir", function() {
        var no_pesanan = $(this).data('no_pesanan');
        var jml_penumpang = $(this).data('jml_penumpang');
        $(".modal-body#detail_body #no_pesanan").val(no_pesanan);
        $(".modal-body#detail_body #jml_penumpang").val(jml_penumpang);
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