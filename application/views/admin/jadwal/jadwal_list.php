<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                        <th>No</th>
                                        <th>Pesanan</th>
                                        <th>Nama</th>
                                        <th>Paket</th>
                                        <th>Berangkat</th>
                                        <th>Pulang</th>
                                        <th>Standard</th>
                                        <th>Minimal</th>
                                        <th>Penawaran</th>
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