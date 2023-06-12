<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url()?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url()?>assets/DataTables/DataTables.min.css">
<div class="card-body">
<button type="button" onclick="printData()" style="margin-right: 10px;" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
                Print
    </button>
    <br>
    <br>
    <table id="example1" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>NAMA OPERATOR</th>
                <th>NAMA UNIT</th>
                <th>TANGGAL</th>
                <th>HM AWAL</th>
                <th>HM AKHIR</th>
                <th>TOTAL JAM</th>
                <th>KETERANGAN</th>
                <th>KONFIRMASI</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($karyawan as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['nama_karyawan']; ?></td>
                    <td><?php echo $dt['nama_unit']; ?></td>
                    <td><?php echo $dt['tanggal']; ?></td>
                    <td><?php echo $dt['hm_awal']; ?></td>
                    <td><?php echo $dt['hm_akhir']; ?></td>
                    <td><?php echo $dt['hm_akhir'] - $dt['hm_awal']; ?></td>
                    <td><?php echo $dt['keterangan']; ?></td>
                    <td><?php echo $dt['konfirmasi']; ?></td>


                </tr>
            <?php endforeach ?>
            <tfoot>
            <?php
            foreach ($sum as $dt) : ?>
                <tr>
                    <th colspan="2">TOTAL JAM KERJA</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>:</th>
                    <th><?php if ($dt['sum(timesheet.hm_akhir-timesheet.hm_awal)'] != NULL) echo number_format($dt['sum(timesheet.hm_akhir-timesheet.hm_awal)'], 0, ',', '.'); ?> JAM </th>
                    <th></th>
                    <th></th>

                </tr>
            <?php endforeach ?>
        </tfoot>

    </table>
    <!--<div class="modal fade" id="tambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url("unit/tambah") ?>">

                            <label for="nama_unit">Nama Unit</label>
                            <input type="text" class="form-control" id="nama_unit" name="nama_unit" placeholder="Masukan Nama Unit">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Masukan Nama Perusahaan">
                            <label for="tahun">Tahun </label>
                            <input type="number" class="form-control" rows="3" id="tahun" name="tahun" placeholder="Masukan Tahun Pembelian">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" rows="3" id="harga" name="harga" placeholder="Masukan Harga Operator">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <?php $no = 0;
    foreach ($unit as $dt) : $no++ ?>
        <div class="modal fade" id="ubahunit<?php echo $dt['id_unit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Unit</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="post" action="<?php echo site_url("unit/edit") ?>">
                                <label for="id_unit">Nama Unit</label>
                                <input type="text" class="form-control" id="id_unit" name="id_unit" value="<?php echo $dt['id_unit']; ?>" readonly>
                                <label for="nama_unit">Nama Unit</label>
                                <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?php echo $dt['nama_unit']; ?>">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?php echo $dt['perusahaan']; ?>">
                                <label for="tahun">Tahun </label>
                                <input type="number" class="form-control" rows="3" id="tahun" name="tahun" value="<?php echo $dt['tahun']; ?>">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" rows="3" id="harga" name="harga" value="<?php echo $dt['harga']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
    -->

</div>
<script>
$(document).ready( function () {
    $('#example1').DataTable();
} );

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