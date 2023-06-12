<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url() ?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/DataTables/DataTables.min.css">
<div class="card-body">
    <form>
        <th colspan="4"><a class="btn btn-primary" data-toggle="modal" data-target="#tambahuser" href="<?php echo site_url('pengguna/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a></th>
    </form>
    <br>

    <table id="example1" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['username']; ?></td>
                    <td><?php echo $dt['password']; ?></td>
                    <td><?php echo $dt['role']; ?></td>
                    <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ubahuser<?php echo $dt['id_user']; ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url("pengguna/delete") . "/" . $dt['id_user']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                    </td>

                </tr>
            <?php endforeach ?>
    </table>
    <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url("pengguna/tambah") ?>">

                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                            <label for="password">Password</label>
                            <textarea class="form-control" rows="3" id="password" name="password" placeholder="Masukan Password"></textarea>
                            <label for="role">Role</label>
                            <input type="number" class="form-control" rows="3" id="role" name="role" placeholder="Masukan Role">
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
    foreach ($user as $dt) : $no++ ?>
        <div class="modal fade" id="ubahuser<?php echo $dt['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data user</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="post" action="<?php echo site_url("pengguna/edit"); ?>">
                                <label for="id_user">ID user</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $dt['id_user']; ?>" readonly>
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $dt['username']; ?>">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $dt['password']; ?>">
                                <label for="role">Role</label>
                                <input type="number" class="form-control" rows="3" id="role" name="role" value="<?php echo $dt['role']; ?>">
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