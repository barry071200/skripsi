<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url() ?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/DataTables/DataTables.min.css">


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="<?= base_url('assets/path_to_sweetalert/sweetalert2.min.css') ?>">
<script src="<?= base_url('assets/path_to_sweetalert/sweetalert2.min.js') ?>"></script>

<div class="card-body">
    <?php
    if (!empty($this->session->flashdata('admin_save_success'))) {
        echo '
    <script>
        Swal.fire({
            icon: "success",
            title: "Sukses",
            text: "' . $this->session->flashdata('admin_save_success') . '",
            showConfirmButton: false,
            timer: 3000
        });
    </script>';
    }
    ?>


    <?php if ($this->session->flashdata('admin_save_success')) : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('admin_save_success'); ?>
        </div>
        <script>
            setTimeout(function() {
                $(".alert").slideUp("slow", function() {
                    $(this).remove();
                });
            }, 3000);
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('admin_hapus_success')) : ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('admin_hapus_success'); ?>
        </div>
        <script>
            setTimeout(function() {
                $(".alert").slideUp("slow", function() {
                    $(this).remove();
                });
            }, 3000);
        </script>
    <?php endif; ?>


    <script>
        // Saat halaman dimuat
        window.addEventListener('DOMContentLoaded', function() {
            // Menghapus flash data dengan AJAX
            fetch('<?php echo base_url('timesheet/clear_flash_data'); ?>', {
                method: 'POST'
            });
        });
    </script>
    <div style="display: flex; align-items: center;">
        <?php if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '4') { ?>
            <form>
                <th colspan="4"><a class="btn btn-primary" style="margin-right: 10px;" data-toggle="modal" data-target="#tambahkaryawan" href="<?php echo site_url('karyawan/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a></th>
            </form>
        <?php } ?>
        <br>
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
                <th>nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Tanggal Lahir</th>
                <th>jenis kelamin</th>

                <?php if ($this->session->userdata('role') == '4' or $this->session->userdata('role') == '1') { ?><th>Action</th><?php } ?>
                <?php if ($this->session->userdata('role') != '4') { ?><th>TIMESHEET</th><?php } ?>

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
                    <td><?php echo $dt['jenis_kelamin']; ?></td>

                    <?php if ($this->session->userdata('role') == '4' or $this->session->userdata('role') == '1') { ?>
                        <td>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#ubahkaryawan<?php echo $dt['id_karyawan']; ?>">Edit</a>
                            <a class="btn btn-danger btn-delete" href="<?php echo site_url("karyawan/delete") . "/" . $dt['id_karyawan']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') != '4') { ?>
                        <td> <a class="btn btn-success" href="<?php echo site_url("karyawan/sheet") . "/" . $dt['id_karyawan']; ?>">SHEET</a></td>
                    <?php } ?>
                </tr>
            <?php endforeach ?>
            <!-- sweet alert -->
            <script>
                // Saat halaman dimuat
                window.addEventListener('DOMContentLoaded', function() {
                    // Dapatkan tombol hapus
                    var deleteButtons = document.querySelectorAll('.btn-delete');

                    // Tambahkan event listener pada setiap tombol hapus
                    deleteButtons.forEach(function(button) {
                        button.addEventListener('click', function(event) {
                            event.preventDefault(); // Menghentikan aksi default dari tombol hapus

                            // Tampilkan konfirmasi Sweet Alert
                            Swal.fire({
                                title: "Konfirmasi",
                                text: "Apakah Anda yakin ingin menghapus?",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Hapus",
                                cancelButtonText: "Batal"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Arahkan ke aksi penghapusan
                                    window.location.href = button.getAttribute('href');
                                }
                            });
                        });
                    });
                });
            </script>
            <!-- sweet alert -->

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
                            <input type="text" required class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukkan Nama Lengkap">
                            <label for="alamat">Alamat</label>
                            <textarea required class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan Alamat Karyawan"></textarea>
                            <label for="no_telpon">Nomor Telpon</label>
                            <input type="number" required class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukkan Nomor Telpon">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" required class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select required class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

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
                                <input type="text" required class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $dt['id_karyawan']; ?>" readonly>
                                <label for="nama_karyawan">Nama Lengkap</label>
                                <input type="text" required class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $dt['nama_karyawan']; ?>">
                                <label for="alamat">Alamat</label>
                                <input type="text" required class="form-control" id="alamat" name="alamat" value="<?php echo $dt['alamat']; ?>">
                                <label for="no_telpon">Nomor Telpon</label>
                                <input type="number" required class="form-control" id="no_telpon" name="no_telpon" value="<?php echo $dt['no_telpon']; ?>">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" required class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dt['tgl_lahir']; ?>">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select required class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-Laki" <?php if ($dt['jenis_kelamin'] == 'laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($dt['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
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