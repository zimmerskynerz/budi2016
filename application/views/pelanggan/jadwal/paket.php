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
                                        <th style="text-align: center;">Berangkat</th>
                                        <th style="text-align: center;">Pulang</th>
                                        <th style="text-align: center;">Hari</th>
                                        <th style="text-align: center;">Keterangan Paket</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Status</th>
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
                                            <td><?= date('d F Y', strtotime($Data_pesanan_paket->tgl_berangkat)) ?></td>
                                            <td><?= date('d F Y', strtotime($Data_pesanan_paket->tgl_selesai)) ?></td>
                                            <td><?= $Data_pesanan_paket->jml_hari ?> Hari</td>
                                            <td>
                                                Fasilitas : <?= $Data_pesanan_paket->ket_paket ?>
                                            </td>
                                            <td>Rp <?= $Data_pesanan_paket->harga_paket ?>,-</td>
                                            <td style="text-align: center;">
                                                SIAP BERANGKAT
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