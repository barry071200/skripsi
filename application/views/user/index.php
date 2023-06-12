<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url() ?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/DataTables/DataTables.min.css">

<div class="card-body">
    <form>
        <th colspan="4"><a class="btn btn-primary" data-toggle="modal" data-target="#tambahunit" href="<?php echo site_url('user/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a></th>
    </form>
    <br>

    <table id="example1" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Username</th>
                <th>Role</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['username']; ?></td>
                    <td><?php echo $dt['role']; ?></td>
                    <td><?php echo $dt['password']; ?></td>
                    <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ubahunit<?php echo $dt['username']; ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url("") . "/" . $dt['username']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>

    </table>
    <div class="modal fade" id="tambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url("pengguna/tambah") ?>">

                            <label for="nama_unit">Usernmae</label>
                            <input type="text" class="form-control" id="nama_unit" name="nama_unit" placeholder="Masukan Nama Unit">
                            <label for="perusahaan">Role</label>
                            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Masukan Nama Perusahaan">
                            <label for="tahun">Password </label>
                            <input type="number" class="form-control" rows="3" id="tahun" name="tahun" placeholder="Masukan Tahun Pembelian">

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
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>