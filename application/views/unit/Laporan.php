<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url() ?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/DataTables/DataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<div class="card-body">

    <br>
    <br>
    <div style="display: flex; align-items: center;">
        <button type="button" onclick="printData()" style="margin-right: 10px;" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
            Print
        </button>
    </div>
    <br>


    <table id="example1" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>UNIT</th>
                <th>OPERATOR</th>
                <th>TANGGAL</th>
                <th>HM AWAL</th>
                <th>HM AKHIR</th>
                <th>JUMLAH</th>
                <th>HARGA SEWA</th>
                <th>TOTAL</th>
                <th>KETERANGAN</th>
                <th>KONFIRMASI</th>


            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($unit as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['nama_unit']; ?></td>
                    <td><?php echo $dt['nama_karyawan']; ?></td>
                    <td><?php echo $dt['tanggal']; ?></td>
                    <td><?php echo $dt['hm_awal']; ?></td>
                    <td><?php echo $dt['hm_akhir']; ?></td>
                    <td><?php echo $dt['hm_akhir'] - $dt['hm_awal']; ?></td>
                    <td>Rp <?php echo number_format($dt['harga'], 0, ',', '.'); ?></td>
                    <td>Rp <?php echo number_format($dt['harga'] * ($dt['hm_akhir'] - $dt['hm_awal']), 0, ',', '.'); ?></td>
                    <td><?php echo $dt['keterangan']; ?></td>
                    <td><?php echo $dt['konfirmasi']; ?></td>


                </tr>
            <?php endforeach ?>
        <tfoot>
            <?php
            foreach ($sum as $dt) : ?>
                <tr>
                    <th colspan="2">TOTAL HARGA SEWA</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>:</th>
                    <th>Rp <?php if ($dt['sum(unit.harga*(timesheet.hm_akhir-timesheet.hm_awal))'] != NULL) echo number_format($dt['sum(unit.harga*(timesheet.hm_akhir-timesheet.hm_awal))'], 0, ',', '.'); ?></th>
                    <th></th>
                    <th></th>

                </tr>
            <?php endforeach ?>
        </tfoot>
    </table>

</div>
<script>
    var table = $('#example1').DataTable();

    new $.fn.dataTable.Buttons(table, {
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });

    table.buttons().container()
        .appendTo($('.col-sm-6:eq(0)', table.table().container()));
</script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>
<script>
    function printData() {
        window.print();
    }

    document.addEventListener("keydown", function(event) {
        if (event.ctrlKey && event.key === "p") {
            printData(); // Memanggil fungsi cetak data
        }
    });
</script>