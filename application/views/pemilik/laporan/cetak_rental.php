<div class="card">
    <div class="card-header">
        <h4>Laporan Rental</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rental</th>
                        <th>No Registrasi</th>
                        <th>Berangkat</th>
                        <th>Pulang</th>
                        <th>Harga</th>
                        <th>Status</th>
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
    </div>
</div>
<script language=javascript>
    function printWindow() {
        bV = parseInt(navigator.appVersion);
        if (bV >= 4) window.print();
    }
    printWindow();
</script>