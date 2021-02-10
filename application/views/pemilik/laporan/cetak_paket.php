<div class="card">
    <div class="card-header">
        <h4>Laporan Paket Wisata</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Pesanan</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Paket</th>
                        <th style="text-align: center;">Berangkat</th>
                        <th style="text-align: center;">Pulang</th>
                        <th style="text-align: center;">Harga</th>
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
                            <td>Rp <?= $Pesanan_paket->harga_paket ?>,-</td>
                            <td style="text-align: center;">
                                <?php
                                if ($Pesanan_paket->status_paket == 'KONFIRMASI') :
                                    echo 'Siap Berangkat';
                                elseif ($Pesanan_paket->status_paket == 'BERANGKAT') :
                                    echo 'Berangkat';
                                elseif ($Pesanan_paket->status_paket == 'SELESAI') :
                                    echo 'Selesai';
                                endif;
                                ?>
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