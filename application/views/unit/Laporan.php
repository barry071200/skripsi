<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url()?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url()?>assets/DataTables/DataTables.min.css">
<div class="card-body">
    <form>
        <th colspan="4"><a class="btn btn-primary" data-toggle="modal" data-target="#tambahunit" href="<?php echo site_url('unit/tambah') ?>">ADD</a></th>
    </form>
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
                <th>ACTION</th>


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
                    <td>Rp <?php echo number_format($dt['harga'],0,',','.'); ?></td>
                    <td>Rp <?php echo number_format($dt['harga'] * ($dt['hm_akhir'] - $dt['hm_awal']),0,',','.'); ?></td>
                    <td><?php echo $dt['keterangan']; ?></td>
                    <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ubahunit<?php echo $dt['id_unit']; ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url("unit/delete") . "/" . $dt['id_unit']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                    </td>

                </tr>
            <?php endforeach ?>
        <tfoot>
            <?php foreach ($sum as $dt) : ?>
                <tr>
                    <th colspan="2">TOTAL HARGA SEWA</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>:</th>
                    <th>Rp <?php echo number_format($dt['sum(unit.harga*(timesheet.hm_akhir-timesheet.hm_awal))'],0,',','.'); ?></th>
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