<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<div class="card-body">
    <form>
        <th colspan="4"><a class="btn btn-primary" data-toggle="modal" data-target="#tambahkaryawan" href="<?php echo site_url('karyawan/tambah') ?>">Tambah Karyawan</a></th>
    </form>
    <br>

    <table id="example1" class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Tanggal Lahir</th>
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
                    <td><?php echo $dt['tgl_lahir']; ?></td>
                    <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ubahkaryawan<?php echo $dt['id_karyawan']; ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url("karyawan/delete") . "/" . $dt['id_karyawan']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                    <td> <a class="btn btn-success" href="//">SHEET</a></td>
                </tr>
            <?php endforeach ?>
        <tfoot>
            <tr>
                <th>NO</th>
                <th>nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Tanggal Lahir</th>
                <th>ACTION</th>
                <th>TIMESHEET</th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="tambahkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url("karyawan/tambah") ?>">

                            <label for="nama_karyawan">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Lengkap">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Karyawan">
                            <label for="no_telpon">Nomor Telpon</label>
                            <input type="number" class="form-control" rows="3" id="no_telpon" name="no_telpon" placeholder="Masukan Nomor Telpon">
                            <label for="no_telpon">Tanggal Lahir</label>
                            <input type="date" class="form-control" rows="3" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
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
    foreach ($karyawan as $dt) : $no++ ?>
        <div class="modal fade" id="ubahkaryawan<?php echo $dt['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="post" action="<?php echo site_url("karyawan/edit"); ?>">
                                <label for="id_karyawan">ID Karyawan</label>
                                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $dt['id_karyawan']; ?>" readonly>
                                <label for="nama_karyawan">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $dt['nama_karyawan']; ?>">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dt['alamat']; ?>">
                                <label for="no_telpon">Nomor Telpon</label>
                                <input type="number" class="form-control" rows="3" id="no_telpon" name="no_telpon" value="<?php echo $dt['no_telpon']; ?>">
                                <label for="no_telpon">Tanggal Lahir</label>
                                <input type="date" class="form-control" rows="3" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dt['tgl_lahir']; ?>">
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

</div>