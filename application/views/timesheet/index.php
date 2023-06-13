<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="<?= base_url() ?>assets/DataTables/DataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/DataTables/DataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="<?= base_url('assets/path_to_sweetalert/sweetalert2.min.css') ?>">
<script src="<?= base_url('assets/path_to_sweetalert/sweetalert2.min.js') ?>"></script>
<!-- sweet alert -->


<div class="card-body">
    <div class="icon-container">

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
            <form>
                <th colspan="4"><a class="btn btn-primary" style="margin-right: 10px;" data-toggle="modal" data-target="#tambahtimesheet" href="<?php echo site_url('timesheet/tambah') ?>"><i class="fa fa-plus"></i> Tambah</a></th>
            </form>
            <br>
            <button type="button" onclick="printData()" style="margin-right: 10px;" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg>
                Print
            </button>
            <br>
            <label for="daterange" style="margin-right: 10px;">Filter tanggal:</label>
            <input type="#date" id="daterange" class="form-control" style="width: 220px;">


        </div>
    </div>
    <br>
    <table id="example1" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>OPERATOR</th>
                <th>UNIT</th>
                <th>TANGGAL</th>
                <th>HM AWAL</th>
                <th>HM AKHIR</th>
                <th>JUMLAH</th>
                <th>KETERANGAN</th>
                <th>KONFIRMASI</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($timesheet as $dt) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['nama_karyawan']; ?></td>
                    <td><?php echo $dt['nama_unit']; ?></td>
                    <td><?php echo $dt['tanggal']; ?></td>
                    <td><?php echo $dt['hm_awal']; ?></td>
                    <td><?php echo $dt['hm_akhir']; ?></td>
                    <td><?php echo $dt['hm_akhir'] - $dt['hm_awal']; ?> Jam</td>
                    <td><?php echo $dt['keterangan']; ?></td>
                    <td><?php echo $dt['konfirmasi']; ?></td>
                    <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ubahtimesheet<?php echo $dt['id_timesheet']; ?>">Edit</a>
                        <a class="btn btn-danger btn-delete" href="<?php echo site_url("timesheet/delete") . "/" . $dt['id_timesheet']; ?>">Hapus<span class="glyphicon glyphicon-remove"></span></a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

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



    <div class="modal fade" id="tambahtimesheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Timesheet Baru</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form method="post" action="<?php echo site_url("timesheet/tambah") ?>">
                            <label for="id_unit">Nama Unit</label>
                            <br>
                            <select name="id_unit" id="id_unit">
                                <?php foreach ($unit as $dt) : ?>
                                    <option value="<?= $dt->id_unit ?>"><?= $dt->nama_unit ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <label for="id_karyawan">Nama Karyawan</label>
                            <br>
                            <select name="id_karyawan" id="id_karyawan">
                                <?php foreach ($karyawan as $dt) : ?>
                                    <option value="<?= $dt->id_karyawan ?>"><?= $dt->nama_karyawan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <label for="tanggal">Tanggal </label>
                            <input type="date" required class="form-control" rows="3" id="tanggal" name="tanggal" placeholder="Masukan Tanggal">

                            <label for="hm_awal">HM AWAL</label>
                            <input type="number" required class="form-control" rows="3" id="hm_awal" name="hm_awal" placeholder="Masukan HM AWAL">
                            <label for="hm_akhir">HM AKHIR</label>
                            <input type="number" required class="form-control" rows="3" id="hm_akhir" name="hm_akhir" placeholder="Masukan HM AKHIR">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" required class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Pekerjaan">
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
    foreach ($timesheet as $dt) : $no++ ?>
        <div class="modal fade" id="ubahtimesheet<?php echo $dt['id_timesheet']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Timesheet</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <form method="post" action="<?php echo site_url("timesheet/edit"); ?>">
                                <label for="id_timesheet">ID Timesheet</label>
                                <input type="text" class="form-control" id="id_timesheet" name="id_timesheet" value="<?php echo $dt['id_timesheet']; ?>" readonly>
                                <label for="id_unit">Nama Unit</label>


                                <br>
                                <select name="id_unit" id="id_unit">
                                    <?php foreach ($unit as $un) : ?>
                                        <option value="<?php echo $un->id_unit ?>" <?php echo ($un->id_unit == $dt['id_unit']) ? 'selected' : '' ?>><?php echo $un->nama_unit ?></option>
                                    <?php endforeach; ?>
                                </select>


                                <br>

                                <label for="id_karyawan">Nama karyawan</label>
                                <br>
                                <select name="id_karyawan" id="id_karyawan">
                                    <?php foreach ($karyawan as $kar) : ?>
                                        <option value="<?php echo $kar->id_karyawan ?>" <?php echo ($kar->id_karyawan == $dt['id_karyawan']) ? 'selected' : '' ?>><?php echo $kar->nama_karyawan ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="tanggal">Tanggal</label>
                                <input type="date" required class="form-control" rows="3" id="tanggal" name="tanggal" value="<?php echo $dt['tanggal']; ?>">
                                <label for="hm_awal">HM AWAL</label>
                                <input type="number" required class="form-control" rows="3" id="hm_awal" name="hm_awal" value="<?php echo $dt['hm_awal']; ?>">
                                <label for="hm_akhir">HM AKHIR</label>
                                <input type="number" required class="form-control" rows="3" id="hm_akhir" name="hm_akhir" value="<?php echo $dt['hm_akhir']; ?>">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" required class="form-control" id="keterangan" name="keterangan" value="<?php echo $dt['keterangan']; ?>">
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
<script>
    $(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            table.draw();
        });
        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            table.draw();
        });
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = moment($('#daterange').val().split(' - ')[0], 'YYYY-MM-DD');
                var max = moment($('#daterange').val().split(' - ')[1], 'YYYY-MM-DD');
                var date = moment(data[3], 'YYYY-MM-DD');
                if ($('#daterange').val() === '') {
                    return true;
                }
                if (min <= date && date <= max) {
                    return true;
                }
                return false;
            }
        );
        $('#daterange').keyup(function() {
            table.draw();
        });
        table.buttons().container()
            .appendTo($('.col-sm-6:eq(0)', table.table().container()));
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