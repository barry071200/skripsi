<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<div class="card-body">
    <form>
        <th colspan="4"><a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="<?php echo site_url('karyawan/tambah') ?>">Tambah Karyawan</a></th>
    </form>
    <br>

    <table id="example1" class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>ACTION</th>
                <th>TIMESHEET</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($karyawan as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['nama_karyawan']; ?></td>
                    <td><?php echo $dt['alamat']; ?></td>
                    <td><?php echo $dt['no_telpon']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo site_url("dashboard/index") . "/" . $dt['id_karyawan']; ?>">Ubah<span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-danger" data-href="<?php echo site_url("dashboard/index") . "/" . $dt['id_karyawan']; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                    <td> <a class="btn btn-success" href="//">SHEET</a></td>
                </tr>
            <?php endforeach ?>
        <tfoot>
            <tr>
                <th>nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>ACTION</th>
                <th>TIMESHEET</th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="">

                            <label for="inputnama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputnama"  placeholder="Masukan Nama Lengkap">
                            <label for="inputalamat">Alamat</label>
                            <input br = "2" type="text" class="form-control" id="inputalamat"  placeholder="Masukan Alamat Karyawan">
                            <label for="inputnomor">Nomor Telpon</label>
                            <input type="number" class="form-control" rows="3" id="inputnomor"  placeholder="Masukan Nomor Telpon">
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
</div>